<?php
namespace App\Http\Controllers\Togroow;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Mockery\Exception;
use App\Models\Servicios\Togroow\Productos;
use Illuminate\Support\Facades\DB;
use App\Services\Carrito\Carrito;
use App\Models\Servicios\Togroow\Compra;
use App\Models\Servicios\Togroow\Negocio;
use App\Services\Mercadopago\Mercadopagos as Servicemercadopago;
use \MercadoPago;
use DateTime;
/**
 * @group  Compra de productos
 * clase  con los productos de togroow
 */

class ComprarController extends Controller
{


    public function validar(Request $request){
        $user  = auth()->user();
        $carrito = $request['carrito'];
        $datacarrito = $carrito;
        $datacarrito['user_id'] = $user->user_id;
        foreach ($datacarrito['CarritoNegocios'] as $key => $negociocarrito) {
            $datacarrito['CarritoNegocios'][$key] = Carrito::validar($negociocarrito,$user->user_id);
        }
        return response()->json($datacarrito);
    }
    

    public function get_client_ip() {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
           $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }

    public function checkoutpagar(Request $request){
        //$serviceMP = new Servicemercadopago();
        error_reporting(E_ALL);
        $data = $request->all();
        if(isset($data['carrito'])){
            $carrito =  $data['carrito'];
            $user  = auth()->user();
            $dataCompra = [];
            $newcompra = Carrito::pagar($carrito,$user);
        } else {
            /*$newcompra = Compra::find(767);
            $data['opcionespago'] = $data;*/
        }
        if($newcompra != false){
            $idnegocio = $newcompra->negocio_compra_negocio;
            $negocio = Negocio::find($idnegocio);
            $negocio->mercadopago;
            if(env('TOOGROW_TESTIG') == 1){
                $tokenmp = env('MP_ACCESS_TOKEN');
                $urlwebhook = "https://apitesting.togroow.com/api/mercadopago/webhook";
                $togroowfee  = 0;
            } else if($negocio->mercadopago->negocio_mercadopago_token){
                $tokenmp = $negocio->mercadopago->negocio_mercadopago_token;
                $urlwebhook = "https://api.togroow.com/api/mercadopago/webhook";
                $togroowfee =(int)(($newcompra->negocio_compra_valor/100)*7);
            }
            if(isset($data['opcionespago']) || isset($data['tipopago']) ){
                if(isset($data['opcionespago'])){
                    $opcionespago = $data['opcionespago'];
                } else {
                    $opcionespago = $data;
                }
                if( $opcionespago['tipopago'] == 1){
                    MercadoPago\SDK::setAccessToken($tokenmp);
                    $payment = new MercadoPago\Payment();
                    $payment->transaction_amount = $newcompra->negocio_compra_valor;
                    $payment->token = $opcionespago['token'];
                    $payment->description = 'Compra de Productos';
                    $payment->installments = (int)$opcionespago['installments'];
                    $payment->payment_method_id =  $opcionespago['paymentMethodId'];
                    $payment->issuer_id = (int) $opcionespago['issuer'];
                    $payer = new MercadoPago\Payer();
                    $payer->email =  $opcionespago['email'];
                    $payer->identification = array(
                        "type" =>  $opcionespago['identificationType'],
                        "number" => $opcionespago['identificationNumber']
                    );
                    $payment->payer = $payer;
                    $payment->notification_url = $urlwebhook;
                    if( $togroowfee > 0){
                        $payment->application_fee = $togroowfee;
                    }
                    $payment->save();
                    $response = array(
                        'token'=>$tokenmp,
                        'tokencard'=> $opcionespago,
                        'status' => $payment->status,
                        'status_detail' => $payment->status_detail,
                        'id' => $payment->id,
                        'transaction_details' => $payment->transaction_details,
                        'payment_error' => $payment->error
                    );
                    $update = [];
                    $update['negocio_compra_idpago'] = $payment->id;
                    $update['negocio_compra_urlefecty'] ='';
                    $update['negocio_compra_tipopago'] =  1;
                    $update['negocio_compra_idpago'] = $payment->id;
                    if($payment->status == 'in_process'){
                        $update['negocio_compra_estado'] = '3';
                        $update['negocio_compra_estado_texto']= "En proceso";
                    } else if($payment->status == 'approved'){
                        $update['negocio_compra_estado'] = '1';
                        $update['negocio_compra_estado_texto'] = "Aprobado";
                    } else if($payment->status == 'rejected'){
                        $update['negocio_compra_estado'] = '2';
                        $update['negocio_compra_estado_texto'] = "Rechazado";
                        Servicemercadopago::sumarcantidades($newcompra);
                    }
                    Compra::where("negocio_compra_id",$newcompra->negocio_compra_id)->update($update);
                    $response = array(
                        'id' => $newcompra->negocio_compra_id,
                    );
                    return response()->json($response);
                
                } else  if($opcionespago['tipopago'] == 2){
                    MercadoPago\SDK::setAccessToken($tokenmp);
                    $payment = new MercadoPago\Payment();
                    $payment->transaction_amount = (int)$newcompra->negocio_compra_valor;
                    $payment->description = "Compra de Productos";
                    $payment->payment_method_id = "pse";
                    $payment->additional_info = array(
                        "ip_address" => $this->get_client_ip()
                    );
                    $payment->transaction_details = array(
                        "financial_institution" => $opcionespago['financial_institution']
                    );
                    $payment->callback_url = env("MP_URL_CALLBACK");
                    $payer = new MercadoPago\Payer();
                    $payer->email = $opcionespago['email'];
                    $payer->identification = array(
                        "type" => $opcionespago['identificationType'],
                        "number" => $opcionespago['identificationNumber']
                    );
                    $payer->entity_type = $opcionespago["entity_type"];
                    $payment->payer = $payer;
                    $payment->notification_url = $urlwebhook;
                    if( $togroowfee > 0){
                        $payment->application_fee = $togroowfee;
                    }
                    $payment->save();
                    $response = array(
                        'status' => $payment->status,
                        'status_detail' => $payment->status_detail,
                        //'id' => $payment->id,
                        'payment' => $payment->transaction_details,
                        'payment2' => $payment
                    );
                    if(isset($payment->transaction_details->external_resource_url)){
                        $update = [];
                        $update['negocio_compra_urlefecty'] ='';
                        $update['negocio_compra_tipopago'] =  2;
                        $update['negocio_compra_idpago'] = $payment->id;
                        Compra::where("negocio_compra_id",$newcompra->negocio_compra_id)->update($update);
                        $response = array(
                            'id' => $newcompra->negocio_compra_id,
                            'url'=>  $payment->transaction_details->external_resource_url
                        );
                    } else {
                        $update['negocio_compra_urlefecty'] ='';
                        $update['negocio_compra_tipopago'] =  2;
                        $update['negocio_compra_idpago'] = '';
                        $update['negocio_compra_estado'] = '2';
                        $update['negocio_compra_estado_texto'] = "Error de pago";
                        Compra::where("negocio_compra_id",$newcompra->negocio_compra_id)->update($update);
                        $response = array(
                            'id' => $newcompra->negocio_compra_id,
                        );
                    }
                    return response()->json($response);
                } else if($opcionespago['tipopago'] == 3){
                    MercadoPago\SDK::setAccessToken($tokenmp);
                    $payment = new MercadoPago\Payment();
                    $payment->transaction_amount = (int)$newcompra->negocio_compra_valor;
                    $payment->description = "venta de productos";
                    $payment->payment_method_id = "efecty";
                    $payment->payer = array(
                        "email" => $opcionespago['email']
                    );
                    $payment->notification_url = $urlwebhook;
                    if( $togroowfee > 0){
                        $payment->application_fee = $togroowfee;
                    }
                    $mifecha= date('Y-m-d H:i:s'); 
                    $NuevaFecha = strtotime ( '+2 hour' , strtotime ($mifecha) ) ; 
                    $NuevaFecha = date ( 'Y-m-d H:i:s' , $NuevaFecha); 
                    $fecha_tmp = DateTime::createFromFormat('Y-m-d H:i:s',$NuevaFecha);
                    $fecha_str = $fecha_tmp->format(DateTime::ATOM);
                    //$payment->date_of_expiration = $fecha_str;
                    $payment->save();
                    /*$response = array(
                        'expirate'=>$fecha_str,
                        'fechanew'=>$NuevaFecha,
                        'status' => $payment->status,
                        'status_detail' => $payment->status_detail,
                        'id' => $payment->id,
                        'transaction_details' => $payment->transaction_details
                    );*/
                    if(isset($payment->transaction_details->external_resource_url)){
                        $update = [];
                        $update['negocio_compra_urlefecty'] = $payment->transaction_details->external_resource_url;
                        $update['negocio_compra_tipopago'] =  3;
                        $update['negocio_compra_idpago'] = $payment->id;
                        Compra::where("negocio_compra_id",$newcompra->negocio_compra_id)->update($update);
                        $response = array(
                            'id' => $newcompra->negocio_compra_id,
                        );
                    } else {
                        $update['negocio_compra_urlefecty'] ='';
                        $update['negocio_compra_tipopago'] =  3;
                        $update['negocio_compra_idpago'] = '';
                        $update['negocio_compra_estado'] = '2';
                        $update['negocio_compra_estado_texto'] = "Error de pago";
                        Compra::where("negocio_compra_id",$newcompra->negocio_compra_id)->update($update);
                        $response = array(
                            'id' => $newcompra->negocio_compra_id,
                        );
                    }
                    return response()->json($response);
                }
            } else {
                $data = file_get_contents("https://togroow.com/core/mercadopago/pagar?compra=".$newcarrito->negocio_compra_id);
                $json = json_decode($data);
                return response()->json($json);
            }
        } else {
            $user  = auth()->user();
            $carrito = $data['carrito'];
            $newcarrito = Carrito::validar($carrito,$user->user_id);
            $array = [];
            $array['error'] = 1;
            $array['negocio'] = $carrito['negocio'];
            $array['carrito'] = $newcarrito;
            return response()->json($array);
        }
    }

    public function detallecompra($id){
        $compra = Compra::find($id);
        $compra->items = $compra->items();
        $compra->negocio = $compra->negocio();
        return $compra;
    }

    public function miscompras(Request $request){
        $data = $request->all();
        $user  = auth()->user();
        $user->user_id;
        $compras = Compra::where("negocio_compra_usuario",$user->user_id)->where("negocio_compra_estado",1)->orderBy("negocio_compra_fecha","DESC");
        if(isset($data['negocio'])){
            $compras->where("negocio_compra_negocio",$data['negocio']); 
        }
        $compras = $compras->get();
        $array = [];
        foreach ($compras as $key => $compra) {
            $compra->items = $compra->items();
            $compra->negocio = $compra->negocio();
            $array[$key] = $compra;
        }
        return response()->json($array);
    }

    

}