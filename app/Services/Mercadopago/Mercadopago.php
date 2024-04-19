<?php 
namespace App\Services\Mercadopago;

use App\Models\Servicios\Togroow\Compra;
use App\Models\Servicios\Togroow\Negocio;
use App\Models\Servicios\Togroow\Productos;


class Mercadopago
{
    public $mp_token;
    public $mp_key ;
    public  $mercadopago ;

    public function __construct()
    {
        $this->mp_token =  env('MP_PUBLIC_KEY');
        $this->mp_key =  env('MP_ACCESS_TOKEN');
        $this->mercadopago = Payment_Mercadopago::getInstance();
        MercadoPago\SDK::configure(['ACCESS_TOKEN' => $this->mp_token]);
    } 
    
    public function pagarProductos($idcompra){
        $compra = Compra::find($idcompra);
        $dataitems = $compra->items;
        $negocio = $compra->negocio;
        $tienda = $compra->negocio->mercadopago;
        if(isset($tienda) && env('TOOGROW_TESTIG') != 1){
            MercadoPago\SDK::configure(['ACCESS_TOKEN' => $tienda->negocio_mercadopago_token]);
        } else {
            MercadoPago\SDK::configure(['ACCESS_TOKEN' => env('MP_ACCESS_TOKEN')]);
        }
        $items = [];
        $total = 0;
        foreach ($dataitems as $key => $item) {
           $it = [];
           $it['id'] = $item->negocio_compra_item_idproducto;
           $it['nombre'] =  $item->negocio_compra_item_nombre;
           $it['cantidad'] = $item->negocio_compra_item_cantidad ;
           $it['moneda'] = 'COP' ;
           $it['valorunidad'] = (int)$item->negocio_compra_item_valor;
           $items[$key] =  $this->mercadopago->getItems($it);
           $total = $total + ($it['valorunidad']*$it['cantidad']);
        }
        if($compra->negocio_compra_valor_envio > 0){
            $it = [];
            $it['id'] = 0;
            $it['nombre'] =  'Costo de Envio';
            $it['cantidad'] = 1;
            $it['moneda'] = 'COP' ;
            $it['valorunidad'] =  $compra->negocio_compra_valor_envio;
            $items[$key+1] =  $this->mercadopago->getItems($it);
            $total = $total + $compra->negocio_compra_valor_envio;
        }
        $comprador =[];
        $comprador['nombre'] = $compra->negocio_compra_nombre;
        $comprador['correo'] = $compra->negocio_compra_correo;
        $payer = $this->mercadopago->getPayer($comprador);
        $preference = new MercadoPago\Preference();
        $preference->items = $items;
        $preference->payer = $payer;
        $rutas = array(
            "success" => "https://togroow.com/core/mercadopago/res",
            "failure" => "https://baulito.co/errorcompra",
            "pending" => "https://togroow.com/core/mercadopago/res?idpago=TGN-".$idcompra
        );
        $preference->back_urls =  $rutas;
        $preference->auto_return = "approved";
        $preference->notification_url =  "https://togroow.com/core/mercadopago/notification";
        $preference->external_reference = "TGN-".$idcompra;
        if($negocio == 1246 ){
            $preference->marketplace_fee = ($total/100)*25;
        } else {
            $preference->marketplace_fee = ($total/100)*7;
        }
        $preference->save();
        if(isset($preference->collector_id) &&  isset($preference->init_point) ){
            $this->restarcantidades($items);
            $idpago = $preference->collector_id;
            $compraModel->editField($idcompra,"	negocio_compra_idpago",$idpago);
            echo json_encode( array('id' => $preference->collector_id,"url"=>$preference->init_point ));
        } else {
            $compraModel->editField($idcompra,"negocio_compra_estado",4);
            echo json_encode( array('id' =>"0","url"=>"/sistem/store/errorpago" ));
        }

    }

    public function restarcantidades($compra){
        $dataitems = $compra->items;
        foreach ($dataitems as $key => $item) {
            $producto = Productos::find($item->negocio_compra_item_idproducto);
            if($producto->store_producto_cantidad >= $item->negocio_compra_item_cantidad){
                $newcantidad = ($producto->store_producto_cantidad - $item->negocio_compra_item_cantidad);
                $producto->store_producto_cantidad  = $newcantidad;
                $producto->save();
            } else {
                $cantidad = Productoscantidades::where('idproducto',$this->store_producto_id)->where("ids_opciones",$item->caracteristicas)->get();
                if(isset($cantidad[0])){
                    $cantidadupdate =  $cantidad[0];
                    if($cantidadupdate)
                    $newcantidad = ($cantidadupdate->cantidades - $item->negocio_compra_item_cantidad);
                     $cantidadupdate->cantidades = $newcantidad;

                }
            }
         }
    }
    public static function sumarcantidades($compra){
        $dataitems = Itemscompra::where('negocio_compra_item_compraid',$compra->negocio_compra_id)->get();
        foreach ($dataitems as $key => $item) {
            if( $item->negocio_compra_confirmacion != 1){
                //echo "entro al producto";
                $item->negocio_compra_confirmacion == 1;
                $item->save();
                $producto = Productos::find($item->negocio_compra_item_idproducto);
                if(isset($producto)){
                    //echo "encontro_producto";
                    if($item->caracteristicas != null){
                        $cantidad = Productoscantidades::where('idproducto',$producto->store_producto_id)->where("ids_opciones",$item->caracteristicas)->first();
                        if(isset($cantidad)){
                            $newcantidad = ($cantidad->cantidades + $item->negocio_compra_item_cantidad);
                            Productoscantidades::where('idproducto',$producto->store_producto_id)->where("ids_opciones",$item->caracteristicas)->update(array("cantidades"=> $newcantidad));
                        }
                        //echo "va a sumar cantidad caracteristica";
                    } else {
                        if(($producto->store_producto_negocio ==1384 && $producto->store_producto_cantidad < 1 ) || $producto->store_producto_negocio != 1384 ){
                            $newcantidad = ($producto->store_producto_cantidad + $item->negocio_compra_item_cantidad);
                            $producto->store_producto_cantidad  = $newcantidad;
                            //echo "va a sumar cantidad";
                            $producto->save();
                        }
                    
                    }
                }
            }
        }
    }

    /** users 
        market
        TEST_USER_208822283
        zChzVdmBWK

        Comprador
        TEST_USER_1084989901
        AthAWx1Ium
    **/



}