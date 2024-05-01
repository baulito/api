<?php
namespace App\Http\Controllers\Mercadopago;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Mockery\Exception;
use App\Models\Servicios\Togroow\Compra;
use App\Models\Servicios\Togroow\Mercadopago as TogroowMercadopago;
use App\Models\Servicios\Togroow\Negocio;
use App\Models\User;
use App\Models\Usuarios;
use \MercadoPago;
use DateTime;
use App\Services\Mercadopago\Mercadopagos as Servicemercadopago;
use App\Services\Notification\Infobip;
use Illuminate\Support\Facades\Redirect;
use App\Services\Notification\Notification;


use GuzzleHttp;
use GuzzleHttp\Subscriber\Oauth\Oauth1;
use Infobip\Api\SendSmsApi;
use Infobip\Api\SmsApi;
use Infobip\Configuration;
use Infobip\Model\SmsAdvancedTextualRequest;
use Infobip\Model\SmsDestination;
use Infobip\Model\SmsTextualMessage;

class MercadopagoController extends Controller
{

    public function getPublickey(){
        $array= [];
        $array["PUBLIC_KEY"] = env('MP_PUBLIC_KEY');
        $array["PSE_BANK"] =  $this->getBankPSE();
        /*echo "<pre>";
        print_r($array);*/
        return response()->json($array);
    }

    public function getBankPSE(){
        $payment_methods = file_get_contents("https://api.mercadolibre.com/v1/payment_methods/search?public_key=".env('MP_PUBLIC_KEY'));
        $metodosdepago = [];
        $bancospse = [];
        $tarjetas = [];
        $contador = 0;
        $payment_methods = json_decode($payment_methods,true);
        
        foreach ($payment_methods['results'] as $key => $metodo) {
            if( $metodo['payment_type_id'] == 'ticket' ){
                $metodosdepago[$contador] = $metodo;
                $contador++;
            } else if( $metodo['payment_type_id'] == 'bank_transfer'){
                $metodosdepago[$contador] = $metodo;
                $contador++;
                foreach ($metodo['financial_institutions'] as $key => $banco) {
                    $bancospse[" ".$banco['id']] = strtoupper($banco['description']);
                }
                
            } else if($metodo['payment_type_id'] == 'credit_card') {

                array_push($tarjetas,$metodo);
            }
        }
        $array = [];
        $array['pse_bank'] = $bancospse;
        $array['cards'] = $tarjetas;
        $array['metodospago'] = $metodosdepago;
        /*echo "<pre>";
        print_r($array);*/
        asort($bancospse);
         return $bancospse;
    }

    public function pagopse(){
        return view('close');
    }

    public function pagopsefinal(){
        return view('close');
    }
    
    public function webhook(Request $request){
        $data = $request->all();
        /*$fh = fopen("./prueba.txt", 'w') or die("Se produjo un error al crear el archivo");
        $texto = json_encode($data);
        fwrite($fh, $texto) or die("No se pudo escribir en el archivo");
        fclose($fh);*/
        
        MercadoPago\SDK::setAccessToken(env('MP_ACCESS_TOKEN'));
        if(isset($data["type"]) && $data["type"] == 'payment' && isset($data["data"]["id"]) ){
            $idpago = $data["data"]["id"];
            $payment = MercadoPago\Payment::find_by_id($idpago);
            if(isset($payment->status)){
                $compra = Compra::where("negocio_compra_idpago",$idpago)->first();
                if($payment->status == 'in_process'){
                    $update['negocio_compra_estado'] = '3';
                    $update['negocio_compra_estado_texto']= "En proceso";
                } else if($payment->status == 'approved'){
                    $update['negocio_compra_estado'] = '1';
                    $update['negocio_compra_estado_texto'] = "Aprobado";
                } else if($payment->status == 'rejected'){
                    $update['negocio_compra_estado'] = '2';
                    $update['negocio_compra_estado_texto'] = "Rechazado";
                    Servicemercadopago::sumarcantidades($compra);
                } else if($payment->status == 'cancelled'){
                    $update['negocio_compra_estado'] = '2';
                    $update['negocio_compra_estado_texto'] = "Rechazado";
                    Servicemercadopago::sumarcantidades($compra);
                }
                Compra::where("negocio_compra_idpago",$idpago)->update($update);
            }
            response()->json(['success' => 'success'], 200);
        } else {
            response()->json(['error' => 'invalid'], 401);
            /* $idpago = '1313314746';
            $payment = MercadoPago\Payment::find_by_id($idpago);
           $compra = Compra::where("negocio_compra_idpago",$idpago)->first();
            if($payment->status == 'in_process'){
                $update['negocio_compra_estado'] = '3';
                $update['negocio_compra_estado_texto']= "En proceso";
            } else if($payment->status == 'approved'){
                $update['negocio_compra_estado'] = '1';
                $update['negocio_compra_estado_texto'] = "Aprobado";
            } else if($payment->status == 'rejected'){
                $update['negocio_compra_estado'] = '2';
                $update['negocio_compra_estado_texto'] = "Rechazado";
                Servicemercadopago::sumarcantidades($compra);
            }
            Compra::where("negocio_compra_idpago",$idpago)->update($update);
            echo "<pre>";
            print_r($payment);*/
        }
    }


    public function validarcompra($compra){
        $payment = MercadoPago\Payment::find_by_id($compra->negocio_compra_idmp);
        if(isset($payment->status)){
            $update = [];
            if($payment->status == 'in_process'){
                $update['negocio_compra_estado'] = '3';
                $update['negocio_compra_estado_texto']= "En proceso";
            } else if($payment->status == 'approved'){
                $update['negocio_compra_estado'] = '1';
                $update['negocio_compra_estado_texto'] = "Aprobado";
                if($compra->negocio_compra_estado != 1){
                    Notification::compra($compra->negocio_compra_id);
                }
            } else if($payment->status == 'rejected'){
                $update['negocio_compra_estado'] = '2';
                $update['negocio_compra_estado_texto'] = "Rechazado";
                if($compra->negocio_compra_estado != 2){
                    Servicemercadopago::sumarcantidades($compra);
                }
            }  else if($payment->status == 'cancelled'){
                $update['negocio_compra_estado'] = '2';
                $update['negocio_compra_estado_texto'] = "Rechazado";
                if($compra->negocio_compra_estado != 2){
                    Servicemercadopago::sumarcantidades($compra);
                }
            }
            if(isset($update['negocio_compra_estado'])){
                Compra::find($compra->negocio_compra_id)->update($update);
                if($update['negocio_compra_estado'] == 1){
                    Servicemercadopago::productosVendidos($compra);
                }
                //echo "idcompra=".$compra->negocio_compra_id." idpago=".$compra->negocio_compra_idpago." estado=".$payment->status."</br>";
            } else {
                //echo "idcompra=".$compra->negocio_compra_id." idpago=".$compra->negocio_compra_idpago." estado=".$payment->status."</br>";
            }
        }
    }

    public function encontraridpago($id){
        $compra = Compra::find($id);
        $pago = MercadoPago\Payment::search(
            array(
                "external_reference" => "TGN-".$id
            )
        );
        $fecha_actual = date("Y-m-d");
        $fechac =  date("Y-m-d",strtotime($fecha_actual."-2 days")); 
        if(isset($pago[0]) && isset($pago[0]->id)){
            $compra->negocio_compra_idmp = $pago[0]->id;
            $compra->save();
            return true;
        }
        return false;
    }
    public function estadocompra($id){
        $compra = Compra::find($id);
        MercadoPago\SDK::setAccessToken(env('MP_ACCESS_TOKEN'));
        if($compra && $compra->negocio_compra_idmp && $compra->negocio_compra_idmp != '' && $compra->negocio_compra_idmp != null){
            $payment = MercadoPago\Payment::find_by_id($compra->negocio_compra_idmp);
            if(isset($payment->status)){
                $this->validarcompra($compra);
            } else {
                $this->encontraridpago($id);
                $compra = Compra::find($id); 
                $this->validarcompra($compra);
            }
        } else if($compra) {
            if( $this->encontraridpago($id) == true){
                $compra = Compra::find($id); 
                $this->validarcompra($compra);
            } else{
                $fechacompra = $compra->negocio_compra_fecha." ".$compra->negocio_compra_hora;
                $fechadespues = date("Y-m-d H:i:s",strtotime($fechacompra."+15 minute"));
                if($fechadespues < date("Y-m-d H:i:s") ){
                    $update = [];
                    $update['negocio_compra_estado'] = '2';
                    $update['negocio_compra_estado_texto'] = "Rechazado";
                    Compra::find($compra->negocio_compra_id)->update($update);
                    Servicemercadopago::sumarcantidades($compra);
                } else {
                    //echo "no hace nada";
                }
            }
        } 
    }

    public function actualizar(){
        $compras = Compra::where("negocio_compra_estado",3)->orWhere("negocio_compra_estado",0)->get();
        foreach ($compras as $key => $compra) {
           if($compra->negocio_compra_idpago != null && $compra->negocio_compra_idpago != '' && $compra->negocio_compra_idpago != 0){
                //echo $compra->negocio_compra_id." - validar <br>";    
                $this->estadocompra($compra->negocio_compra_id);
            } else {
                //echo $compra->negocio_compra_id." - rechazar <br>";
                $update = [];
                $update['negocio_compra_estado'] = '2';
                $update['negocio_compra_estado_texto'] = "Rechazado";
                Compra::find($compra->negocio_compra_id)->update($update);
                Servicemercadopago::sumarcantidades($compra);
           }
        }
    }

    public function vincularMercadopago(){
        return '<a  href="https://auth.mercadopago.com.co/authorization?client_id='.env('MP_CLIENT_ID').'&response_type=code&platform_id=mp&state='.'1384'.'&redirect_uri='.env('MP_URL_AUTH').'"> Ya tengo una cuenta en Mercadopago y quiero vincularla a  TOGROOW </a>';
    }

    public function authorization(Request $request){
        $data = $request->all();
        echo "<pre>";
        print_r($data);
    }

    public function getreportes(Request $request){
        $data = $request->all();
        $desde = date("Y-01-01");
        $hasta = date("Y-m-01");
        if(isset($data['desde'])){
           $desde = $data['desde'];
        }
        if(isset($data['hasta'])){
            $hasta = $data['hasta'];
        }
        //echo $desde." - ".$hasta;
        $datos = Servicemercadopago::getReportes($desde,$hasta);
        return response()->json($datos);
    }

    public function res(Request $request){
        $datar = $request->all();
        if(isset($datar["idpago"])){
            $idpago = $datar["idpago"];
        } else if( isset($datar["external_reference"]) ){
            $id = $datar["external_reference"];
        }
        echo "ippago=".$idpago." id=".$id;
        if(isset($id)){
            if( strpos($id,'TGN-') !== false){
                $idcompra = str_replace("TGN-","",$id);
                $compra = Compra::find($idcompra);
                //$this->estadocompra($idcompra);
                if($compra->negocio_compra_desde == 1){
                    //return view('close')
                    echo "entroaca";
                    return redirect('api/mercadopago/pagopsefinal');
                } else { 
                    echo "entro aca";  
                    echo $url = env('URL_RETURN_PAGE',"https://baulito.co")."/mypurchases/".$compra->negocio_compra_id."?payments=res";
                    return Redirect::to($url);
                } 
            }
        } else if(isset($idpago)){
            $idcompra = str_replace("TGN-","",$idpago);    
            $compra = Compra::find($idcompra);
            if($compra->negocio_compra_estado == 0){
                $update = [];
                $update['negocio_compra_estado'] = '2';
                $update['negocio_compra_estado_texto'] = "Rechazado";
                Compra::find($compra->negocio_compra_id)->update($update);
                Servicemercadopago::sumarcantidades($compra);
            }
            if($compra->negocio_compra_desde == 1){
                echo "entroaca";
                return redirect('api/mercadopago/pagopsefinal');
            } else {  
                echo "entro al api"; 
                $url = env('URL_RETURN_PAGE',"https://baulito.co")."/mypurchases/".$compra->negocio_compra_id."?payments=res";
                echo $url;
                return Redirect::to($url);
            }
        } else {
            //echo "pago rechazado";
        }
    }

    public function notification(Request $request){
        $data = $request->all();
        $archivo = fopen('notificacionmercadopago.txt', 'a');
		fwrite($archivo, json_encode($data).PHP_EOL);
	    fclose($archivo);
        if(isset($data['data_id'])){
            $idpago = $data['data_id'];
            //echo  $idpago."<br>";
            //echo env('MP_ACCESS_TOKEN');
            MercadoPago\SDK::setAccessToken(env('MP_ACCESS_TOKEN'));
            $payment = MercadoPago\Payment::find_by_id($idpago);
            echo "<pre>";
            print_r($payment);
            echo "<pre>";
            if(isset($payment->external_reference)){
                $idcompra =  $idcompra = str_replace("TGN-","",$payment->external_reference);
                $compra = Compra::find($idcompra );
                $compra->negocio_compra_idmp = $idpago;
                $compra->save();
                $this->estadocompra($idcompra);
            }
        }
        //return response()->json(['success' => 'success'], 200);
    }

    public function validarpago(Request $request){
        $data = $request->all();
        if(isset($data['id'])){
            $id = $data['id'];
            $compra = Compra::find($id);
            $tienda = $compra->negocio->mercadopago;
            if(isset($tienda) && env('TOOGROW_TESTIG') != 1){
                MercadoPago\SDK::configure(['ACCESS_TOKEN' => $tienda->negocio_mercadopago_token]);
            } else {
                MercadoPago\SDK::setAccessToken(env('MP_ACCESS_TOKEN'));
            }
            $pago = MercadoPago\Payment::search(
                array(
                    "external_reference" => "TGN-".$id
                )
            );
            
            if(isset($pago) && isset($pago[0]) ){
                $pagoactual = end($pago);
                $compra->negocio_compra_idmp = $pagoactual->id;
                $compra->save();
                $this->estadocompra($compra->negocio_compra_id);
                return response()->json($pagoactual);
            }
        }
    }

    public function informacionpago(Request $request){
        $data = $request->all();
        if(isset($data['id'])){
            $id = $data['id'];
            $compra = Compra::find($id);
            $tienda = $compra->negocio->mercadopago;
            if(isset($tienda) && env('TOOGROW_TESTIG') != 1){
                MercadoPago\SDK::configure(['ACCESS_TOKEN' => $tienda->negocio_mercadopago_token]);
            } else {
                MercadoPago\SDK::setAccessToken(env('MP_ACCESS_TOKEN'));
            }
            if($compra && $compra->negocio_compra_idmp && $compra->negocio_compra_idmp != '' && $compra->negocio_compra_idmp != null && 1 == 2){
                $payment = MercadoPago\Payment::find_by_id($compra->negocio_compra_idmp);
               echo "<pre>";
               print_r($payment);
               echo "</pre>";
            } else if($compra) {
                $pago = MercadoPago\Payment::search(
                    array(
                        "external_reference" => "TGN-".$id
                    )
                );
                if(isset($pago) && isset($pago[0]) ){
                    echo "<pre>";
                    print_r($pago);
                    echo "</pre>";
                }
            } 
            
           
            
          
        }
    }



    public function enviarUsuarios($page=0){
        $telefonos = [];
        $usuarios = Usuarios::where("user_codigoregistro","Baulito.com")->paginate(400, ['*'], 'page', $page);
        /*echo "Total Usuarios: ".$usuarios->total()."<br>";
        echo "ultimapagina:".$usuarios->lastPage()."<br>";
        echo "paginaactual:".$usuarios->currentPage()."<br>";*/
        foreach ($usuarios as $key => $usuario) {
            $noaplica = 0;
            if(strpos($usuario->user_phone,'57') !== false && strpos($usuario->user_phone,'57') == 0 ){
                $noaplica= 1;
            }
            if($noaplica == 0){
                if(strlen($usuario->user_phone) == 10 ){
                    array_push($telefonos,"57".$usuario->user_phone);
                }
            } else {
                if(strlen($usuario->user_phone) == 12){
                    array_push($telefonos,$usuario->user_phone);
                }
            }
            
        }
        $mensaje = "Hola, desde el Baulito.co te informamos que hemos actualizado nuestra aplicación para darte un mejor servicio. Actualiza tu aplicación desde el store de tu dispositivo.";
        $mensaje = "Hola, actualiza la APP del BAULITO a la última versión en el APP Store de tu celular.";
        Infobip::EnviarSMS($telefonos,$mensaje);
        return $usuarios->lastPage();
    }


    public function notificar(Request $request){
        $pagina = 1;
        //echo date('h:i:s') . "\n"; 
        $numeropaginas = $this->enviarUsuarios($pagina);
        sleep(30);
        $pagina++;
        for ($i=$pagina; $i <= $numeropaginas; $i++) {
            //echo date('h:i:s') . "\n"; 
            $this->enviarUsuarios($i);
            sleep(30);
        }
        //Infobip::EnviarSMS("573002150908","Hola, actualiza la APP del BAULITO a la última versión en el APP Store de tu celular.");
    }


}