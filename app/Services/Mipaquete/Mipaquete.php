<?php 
namespace App\Services\Mipaquete;

use App\Models\Servicios\Togroow\Compra;
use App\Models\Servicios\Togroow\Negocio;


class Mipaquete
{
    public static function request($metodo,$data,$tipo = null,$api = null){
        try {
            /*echo "<pre>";
            print_r($data);
            echo "</pre>";*/
            //$url = "https://api-v2.dev.mpr.mipaquete.com/".$metodo;
            $url = "https://api-v2.mpr.mipaquete.com/".$metodo;
            $ch = curl_init();
            $header = [];
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $header[] ="Content-Type: application/json";
            $header[] ="session-tracker: a0c96ea6-b22d-4fb7-a278-850678d5429c";
           
            if( $api != null){
                //echo "token:".Session::getInstance()->get('mercadopagokey');
                $token = $api;
                $header[] = "apikey: ".$token;
            }
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
                $data = json_decode($result, JSON_UNESCAPED_UNICODE);
                curl_close($ch);
                return  $data;
            }
        } catch(Exception $e) {
            echo $e->getCode()." ".$e->getMessage();
            //trigger_error(sprintf('Curl failed with error #%d: %s',$e->getCode(), $e->getMessage()),E_USER_ERROR);
        }
    }


    public static function calcularvalor($origen,$destino,$alto,$largo,$ancho,$peso,$valordeclarado,$valordeventa,$api){
        if($valordeclarado > 2000000){
            $valordeclarado = 2000000;
        } else if($valordeclarado < 10000){
            $valordeclarado = 10000;
            $valordeventa = 10000;
        }
        if($peso < 1 ){
            $peso = 1;
        } else {
            $peso = ceil($peso);
        }

        $data = [  
            "originLocationCode"=> $origen, // código DANE de ciudad o municipio origen
            "destinyLocationCode"=> $destino, // código DANE de ciudad o municipio destino
            "height"=> $alto, // alto del paquete
            "width"=> $ancho, // ancho del paquete
            "length"=> $largo, // largo del paquete
            "weight"=> (int)$peso, // peso del paquete
            "quantity"=> 1, // cantidad de paquetes con la misma medida y peso
            "declaredValue"=> $valordeclarado, // valor declarado o valor asegurar de la unidad (cuánto cuesta producir el producto)
            "saleValue"=> $valordeventa // aplica para pago contraentrega - el valor de la venta del producto o paquete.
        ];
       /*  echo "<pre>";
        print_r($data);
        echo "</pre>";*/
        $resultados = self::request("quoteShipping",$data,1,$api);
        $orden = [];
        foreach ($resultados as $key => $data) {
            if(isset($data['shippingCost'])){
                $orden[$key] = $data['shippingCost'];
            }
        }
        array_multisort($orden, SORT_ASC, $resultados);
        return $resultados;
    }

    public static function consultarenvios($api,$mpcode,$fechacompra = ''){
        if($fechacompra == ''){
            $fechacompra = date("Y-m-d");  
        }
        $data = [];
        $data['mpCode'] = (int)$mpcode;
        $data["confirmationDate"] = [];
        $data["confirmationDate"]['init'] = $fechacompra;
        $data["confirmationDate"]['end'] = date("Y-m-d");
        $data["pageSize"]= 25;
        $resultados =self::request("getSendings/1",$data,1,$api);
        if(isset($resultados['sendings'][0])){
            return $resultados['sendings'][0];
        } else {
            return false;
        }
       
    }

    public static function consultarusuario($api){
        $data = [];
        $resultados = self::request("getUser",$data,0,$api);
        return $resultados;  
    }

    public static function cancelarenvio($mpCode,$api){
        $data = [];
        $data['mpCode'] = $mpCode;
        $resultados = self::request("cancelSending",$data,3,$api);
        return $resultados;
    }

    public static function generarEnvio($dataenvio,$api){
        return self::request("createSending",$dataenvio,1,$api);
    }
}