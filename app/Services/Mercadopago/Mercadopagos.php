<?php 
namespace App\Services\Mercadopago;

use App\Models\Product;
use App\Models\Servicios\Togroow\Compra;
use App\Models\Servicios\Togroow\Negocio;
use App\Models\Servicios\Togroow\Productos;
use App\Models\Servicios\Togroow\Itemscompra;
use App\Models\Servicios\Togroow\Productoscantidades;

use MercadoPago;

class Mercadopagos
{
    public $mp_token;
    public $mp_key ;
    public  $mercadopago ;

    public function __construct()
    {
        $this->mp_token = config("services.mercadopago.token");
        $this->mp_key = config("services.mercadopago.key");
        MercadoPago\SDK::configure(['ACCESS_TOKEN' => $this->mp_token]);
        MercadoPago\SDK::setClientId(env('MP_CLIENT_ID')); 
        MercadoPago\SDK::setClientSecret(env('MP_CLIENT_SECRET'));
    } 
    
    //no se usa en el api actualmente
    public static function pagarProductos($idcompra){
        $compra = Compra::find($idcompra);
        if(isset($compra)){
            $dataitems = $compra->items;
            $tokenmp = env('MP_ACCESS_TOKEN');
            MercadoPago\SDK::configure(['ACCESS_TOKEN' => $tokenmp ]);
            $rutas = array(
                "success" =>  env('MP_URL_NOTIFICATION','https://api.baulito.co/api/mercadopago/res'),
                "failure" => env('MP_URL_NOTIFICATION','https://api.baulito.co/api/mercadopago/failure')."?idpago=TGN-".$idcompra,
                "pending" => env('MP_URL_NOTIFICATION','https://api.baulito.co/api/mercadopago/res')."?idpago=TGN-".$idcompra
            );
            $urlnotification = env('MP_URL_NOTIFICATION','https://api.baulito.co/api/mercadopago/notification');
            $items = [];
            $total = 0;
            foreach ($dataitems as $key => $item) {
                $it = [];
                $it['id'] = $item->negocio_compra_item_idproducto;
                $it['nombre'] =  $item->negocio_compra_item_nombre;
                $it['cantidad'] = $item->negocio_compra_item_cantidad ;
                $it['moneda'] = 'COP' ;
                $it['valorunidad'] = (int)$item->negocio_compra_item_valor;
                $items[$key] =  self::getItems($it);
                $total = $total + ($it['valorunidad']*$it['cantidad']);
            }
            if($compra->negocio_compra_valor_envio > 0 && $compra->negocio_compra_tipoenvio != 1 ){
                $it = [];
                $it['id'] = 0;
                $it['id'] = 0;
                $it['nombre'] =  'Costo de Envio';
                $it['cantidad'] = 1;
                $it['moneda'] = 'COP' ;
                $it['valorunidad'] =  $compra->negocio_compra_valor_envio;
                $items[$key+1] =  self::getItems($it);
                $total = $total + $compra->negocio_compra_valor_envio;
            }
            $comprador =[];
            $comprador['nombre'] = $compra->negocio_compra_nombre;
            $comprador['correo'] = $compra->negocio_compra_correo;
            $payer = self::getPayer($comprador);
            $preference = new MercadoPago\Preference();
            $preference->items = $items;
            $preference->payer = $payer;
            $preference->back_urls =  $rutas;
            $preference->auto_return = "approved";
            $preference->notification_url =  $urlnotification;
            $preference->external_reference = "TGN-".$idcompra;
            $preference->payment_methods = array(
                "excluded_payment_types" => array(
                  array("id" => "ticket")
                ),
            );
            $fechaactual= date("Y-m-d H:i:s");
            $fechainicio = date("c", strtotime($fechaactual));
            $fechafin = date("c",strtotime('+10 minute', strtotime($fechaactual)));
            $preference->expires = true;
            $preference->expiration_date_from =  $fechainicio;
            $preference->expiration_date_to =  $fechafin;
            $preference->save();
            if(isset($preference->collector_id) &&  isset($preference->init_point) ){
                self::restarcantidades($compra);
                $idpago = $preference->collector_id;
                $compra->negocio_compra_idpago = $idpago;
                $compra->save();
                return array('id' => $compra->negocio_compra_id,"url"=>$preference->init_point);
            } else {
                $idpago = $preference->collector_id;
                $compra->negocio_compra_estado = 4;
                $compra->save();
                return array('id' => $compra->negocio_compra_id,"url"=>null);
            }
        }

    }

    public static function restarcantidades($compra){
        if($compra){
            $dataitems = Itemscompra::where('negocio_compra_item_compraid',$compra->negocio_compra_id)->get();
            foreach ($dataitems as $key => $item) {
                $producto = Product::find($item->negocio_compra_item_idproducto);
                if(isset($producto)){
                    $newcantidad = ($producto->amount - $item->negocio_compra_item_cantidad);
                    $producto->amount  = $newcantidad;
                    $producto->save();
                    
                }
            }
        }
    }

    public static function sumarcantidades($compra){
        $dataitems = Itemscompra::where('negocio_compra_item_compraid',$compra->negocio_compra_id)->get();
        foreach ($dataitems as $key => $item) {
            if( $item->negocio_compra_confirmacion != 1){
                //echo "entro al producto";
                $item->negocio_compra_confirmacion = 1;
                $item->save();
                $producto = Product::find($item->negocio_compra_item_idproducto);
                if(isset($producto)){
                        $newcantidad = ($producto->amount + $item->negocio_compra_item_cantidad);
                        $producto->amount  = $newcantidad;
                        //echo "va a sumar cantidad";
                        $producto->save();
                }
            }
        }
    }


    public static function request($metodo,$data,$tipo = null,$retorno = 0){
        try {
            $url = "https://api.mercadopago.com/v1/account/".$metodo;
            $ch = curl_init();
            $header = [];
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $header[] ="Content-Type: application/json";
            $token = env('MP_ACCESS_TOKEN');
            $token = "APP_USR-5190954569960248-060220-b70dcac005e3c6b8369eddb1a76c630f-263237118";
            $header[] ="Authorization: Bearer ".$token;
            /*echo "<pre>";
            print_r($header);
            echo "</pre>";*/
            curl_setopt($ch, CURLOPT_HTTPHEADER,$header);
            if(isset($tipo) && $tipo == 1){
                curl_setopt($ch, CURLOPT_URL,$url);
                curl_setopt($ch, CURLOPT_POST, TRUE);
                curl_setopt($ch, CURLOPT_POSTFIELDS,  json_encode($data));
            } else if(isset($tipo) && $tipo == 2) {
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
            } else if(isset($tipo) && $tipo == 3){
                //echo "envio put";
                curl_setopt($ch, CURLOPT_URL,$url);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
                curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($data,JSON_NUMERIC_CHECK));
                //echo json_encode($data,JSON_NUMERIC_CHECK);
            } else {
                if( count($data) > 0 ) {
                    $query = http_build_query($data);
                    curl_setopt($ch, CURLOPT_URL, "$url?$query");
                } else {
                    curl_setopt($ch, CURLOPT_URL, $url);
                }
            }
            $result = curl_exec($ch);
            if ($result === false) {
                throw new Exception(curl_error($ch), curl_errno($ch));
            } else{
                if($retorno == 0){
                    $data = json_decode($result, JSON_UNESCAPED_UNICODE);
                } else {
                    $data = $result;
                }
                curl_close($ch);
                return  $data;
            }
        } catch(Exception $e) {
            echo $e->getCode()." ".$e->getMessage();
            //trigger_error(sprintf('Curl failed with error #%d: %s',$e->getCode(), $e->getMessage()),E_USER_ERROR);
        }
    }

    public static function getReportes($desde,$hasta){
        $reportes = self::request("settlement_report/list",[],0);
        /*echo "<pre>";
        print_r($reportes);*/
        $datos = [];
        if(!isset($reportes['error'])){
            while ($desde <= $hasta) {
                //echo "entro";
                //$nuevafecha = date("Y-m-d",strtotime($fecha."- ".$contador." month"));
                $data = self::traerfecha($reportes,$desde);
                $reportes = $data['reportes'];
                if($data['valor'] > 0){
                    $datos[$desde] = round($data['valor']);
                    //echo "el ingreso fue de ".$data['valor']." para ".$nuevafecha."<br>";
                } else {
                    $datos[$desde] = 0;
                }
                $desde = date("Y-m-d",strtotime($desde."+ 1 month"));
            }
        } 
        return $datos;
    }

    public static function traerfecha($reportes, $fecha,$contador = 0){
        $data = [];
        $data['reportes'] = $reportes;
        $data['valor'] = 0;
        foreach ($reportes as $key => $reporte) {
            $fechareporte = date("Y-m-d",strtotime($reporte['begin_date']));
            if($fechareporte == $fecha){
                $valor = self::traerReporte($reporte['file_name']);
                if($valor > 0){
                    $data['valor'] = $valor;
                    return $data;   
                }
            }
        }
        self::generarreporte($fecha);
        $reportes = self::request("settlement_report/list",[],0);
        if($contador < 1){
            $data = self::traerfecha($reportes,$fecha,$contador+1);
        }
        return $data;
    }

    public static function generarreporte($fecha){
        $data = [];
        $data['begin_date'] = $fecha."T00:00:00Z";
        $data['end_date'] = date("Y-m-d",strtotime($fecha."+ 1 month"))."T00:00:00Z";
        $reporte =  self::request("settlement_report",$data,1);
    }

    public static function traerReporte($file){
        $reporte =  self::request("settlement_report/".$file,[],0,1);
        return self::formatReporte($reporte);

    }

    public static function formatReporte($csvtext){
        $fp = fopen("php://temp", 'r+');
        fputs($fp, $csvtext);
        rewind($fp);
        $csv = [];
        while ( ($data = fgetcsv($fp) ) !== FALSE ) {
            $csv[] = $data;
        }
        fclose($fp);
        $valor = 0;
        for ($i=1; $i < count($csv) ; $i++) { 
            $data = explode(";",$csv[$i][0]);
            //echo $data[7]."<br>";
            $valor = $valor +(float)$data[7];
        }
        return $valor;
    }

    public static function getItems($data){
        $item = new MercadoPago\Item();
        $item->id = $data['id'];
        $item->title = $data['nombre'];
        $item->quantity = $data['cantidad'];
        $item->currency_id = $data['moneda'];
        $item->unit_price = $data['valorunidad'];
        return $item;
    }

    public static function getPayer($data){
        $payer = new MercadoPago\Payer();
        $payer->name = $data['nombre'];
        $payer->surname = "";
        $payer->email = $data['correo'];
        return $payer;
    }

    public static function productosVendidos($compra){
        $dataitems = Itemscompra::where('negocio_compra_item_compraid',$compra->negocio_compra_id)->get();
        foreach ($dataitems as $key => $item) {
            $producto = Product::find($item->negocio_compra_item_idproducto);
            if(isset($producto)){
                    //$producto->store_producto_vendido = 1;
                    $producto->state = 0;
                    $producto->save();
            }
        }
    }


}