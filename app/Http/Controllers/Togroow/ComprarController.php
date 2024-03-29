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
use App\Models\Servicios\Togroow\Mipaquete;
use App\Services\Mercadopago\Mercadopagos as Servicemercadopago;
use App\Services\Mipaquete\Mipaquete as Mipaqueteservice;

use App\Services\Notification\Notification;
use App\Services\Notification\Infobip;

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
            $desde = 0;
            if(isset($data['pagodesde'])){
                $desde = $data['pagodesde'];
            }
            $carrito['desde'] = $desde;
            if(isset($data['opcionespago']) && isset($data['opcionespago']['tipoenvio'])){
                $carrito['tipoenvio'] = $data['opcionespago']['tipoenvio'];
            } else {
                $carrito['tipoenvio'] = 0;
            }
           
            $user  = auth()->user();
            $dataCompra = [];
            $newcompra = Carrito::pagar($carrito,$user);
        }/* else {
            $newcompra = Compra::find(868);
        }*/
        if(isset($newcompra) && $newcompra != false){
            $idnegocio = $newcompra->negocio_compra_negocio;
            $negocio = Negocio::find($idnegocio);
            $negocio->mercadopago;
            $pagos = Servicemercadopago::pagarProductos($newcompra->negocio_compra_id);
            return response()->json($pagos);
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

    public function infopago($id){
        $compra = Compra::find($id);
        if($compra->negocio_compra_idmp){
            $payment = MercadoPago\Payment::find_by_id($compra->negocio_compra_idmp);  
        } else {
            $payment = MercadoPago\Payment::find_by_id($compra->negocio_compra_idpago); 
        }
        $pagos = [];
        if(isset($payment->id)){
            $pagos['estado'] =  $compra->negocio_compra_estado_texto;
            if($payment->payment_type_id == 'credit_card'){
                $pagos['tipo'] =  'Tarjeta de crédito';
            } else if($payment->payment_type_id == 'debit_card'){
                $pagos['tipo'] =  'Tarjeta debito';
            } else if($payment->payment_type_id == 'bank_transfer'){
                $pagos['tipo'] =  'PSE';
            } else if($payment->payment_type_id == 'ticket'){
                $pagos['tipo'] =  'Efecty';
            } else if($payment->payment_type_id == 'account_money'){
                $pagos['tipo'] =  'Mercado pago';
            }
            $pagos['entidad'] = $payment->payment_method_id;
            $pagos['fecha'] = date("Y-m-d H:i:s",strtotime($payment->date_created));
        }
        
        return $pagos;
    }

    public function detallecompra($id){
        MercadoPago\SDK::setAccessToken(env('MP_ACCESS_TOKEN'));
        $compra = Compra::find($id);
        $compra->items;
        $compra->negocio;
        $compra->infopago = $this->infopago($id);
        $negocio = $compra->negocio_compra_negocio;
        if($compra->negocio_compra_mipaquete == 1){
            $mipaquete =  Mipaquete::where("negocio",$negocio)->get();
            if(isset($mipaquete[0])){
                $compra->informacionenvio =  Mipaqueteservice::consultarenvios($mipaquete[0]->apikey,$compra->negocio_compra_mpcode,$compra->negocio_compra_fecha);
            }
        } else if($compra->negocio_compra_mipaquete == 2){
            $compra->informacionenvio = [];
            $compra->informacionenvio['ubicacion'] = [];
            $idproducto = $compra->items[0]->negocio_compra_item_idproducto;
        }
        /*echo "items";
        print_r($compra->items);*/
        //$compra->negocio = $compra->negocio;
        return response()->json($compra);
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
            $compra->items ;
            $compra->negocio;
            $array[$key] = $compra;
        }
        return response()->json($array);
    }


    public function notificarcompra($id){
        //Notification::compra($id);
        Infobip::EnviarSMS();
    }
    

}