<?php 
namespace App\Services\Carrito;

use App\Models\Campus;
use App\Models\Servicios\Togroow\Compra;
use App\Models\Servicios\Togroow\Itemscompra;
use App\Models\Servicios\Togroow\Negocio;
use App\Models\Product;
use App\Models\Mipaquete;
use App\Services\Mipaquete\Empaque;
use App\Services\Mipaquete\Mipaquete as Servicemipaquete;
use App\Models\Servicios\Togroow\Useraddress;
use App\Models\Servicios\Togroow\Mercadopago;
use App\Models\Servicios\Togroow\Productosopcioncaracteristica;
use App\Services\Mercadopago\Mercadopagos as Servicemercadopago;
use App\Models\Servicios\Togroow\Productoscantidades;
use App\Models\Servicios\Togroow\Mipaqueteciudades;
use App\Models\Servicios\Togroow\Negociopuntos;


class Carrito
{

    public static function validar($carrito,$iduser,$sinenvio = 0){
        
        if(isset($carrito['Items']) && count($carrito['Items']) > 0 ){
            $items = $carrito['Items'];
            $productos = [];
            $error = 0;
            if(count($items) == 0){
                $error = 1;
            }
            $productoactual = Product::find($items[0]['id']);
            foreach ($items as $key => $item) {
                $producto = Product::find($item['id']);
                $carrito['Items'][$key]['disponibilidad'] = 1;
                if($producto->state == 0){ 
                    $carrito['Items'][$key]['disponibilidad'] = 0;
                    $error = 1;
                } else if($producto->amount < $item['cantidad']){
                    $carrito['Items'][$key]['disponibilidad'] = 0;
                    $error = 1;
                }
                $producto->cantidaditem = $item['cantidad'];
                array_push($productos,$producto);
            }

            $infoMipaquete = Mipaquete::find(1);
            $paquetes = Empaque::calcularempaque($productos);
            
            $valorenvio = [];
            $errordireccion = 0;
            if(isset($infoMipaquete)){
                $mipaquete = $infoMipaquete;
                $api = $mipaquete->apikey;
                $direccion = Useraddress::where("principal",1)->where("user_id",$iduser)->get();
                $valortotalenvio = 0;
                $dataenvios = [];
                if(isset($direccion[0])){
                    foreach ($paquetes as $key => $paquete) {
                        $destino = $direccion[0]->ciudad;
                        $alto = $paquete['alto'];
                        $largo = $paquete['largo'];
                        $ancho = $paquete['ancho'];
                        $peso = (int)$paquete['peso'];
                        $valordeclarado =  $paquete['valor'];
                        $valordeventa =  $paquete['valor'];
                        $origen = $paquete['origen'];
                        $valorenvio = Servicemipaquete::calcularvalor($origen,$destino,$alto,$largo,$ancho,$peso,$valordeclarado,$valordeventa,$api);
                        if(isset($valorenvio[0])){
                            $valortotalenvio = $valortotalenvio + $valorenvio[0]['shippingCost'];
                        }
                        $dataenvios[$key] = [];
                        $dataenvios[$key]['infoenvio'] = $paquete;
                        $dataenvios[$key]['valorenvio'] = $valorenvio;
                    }
                } else {
                    $errordireccion = 1;
                    if($sinenvio == 1){
                        $error = 1;
                    }
                }
            }
            $puntodeventa = [];
            $tipoenvio = 1;
            if(count($paquetes) > 1){
                $tipoenvio = 2;
            } else {
                $puntodeventa = Campus::campusformat($productoactual->campus);
            }
            $carrito['campusid'] = $productoactual->campus;
            $carrito['campus'] = $puntodeventa;
            $carrito['sindireccion'] = $errordireccion;
        } else {
            $tipoenvio = 0;
            $valortotalenvio = 0;
            $error = 1;
        }
        $carrito['tipoenvio'] = $tipoenvio;
        $carrito['valorenvio'] = $valortotalenvio;
        //$carrito['dataenvio'] =  $dataenvios;
        $carrito['error']  = $error; 
        return $carrito;
    }

    public static function pagar($carrito,$iduser){
        $newcarrito = self::guardarCarrito($carrito,$iduser);
        return $newcarrito;
    }
    public static function guardarCarrito($carrito,$user){
        $validacion =  self::validar($carrito,$user->user_id,$carrito['tipoenvio']);
        if($validacion['error'] == 0   || ( $validacion['sindireccion'] == 1 && isset( $carrito['tipoenvio']) &&  $carrito['tipoenvio'] == 1 )){
            $direcciona= Useraddress::where("principal",1)->where("user_id",$user->user_id)->get();
            if(isset($direcciona[0]) || ( isset( $carrito['tipoenvio']) &&  $carrito['tipoenvio'] == 1 ) ){
                if(isset($direcciona[0])){
                    $direccion = $direcciona[0];
                    $documento = $direccion->documento;
                    $nombre = $direccion->nombre;
                    $telefono = $direccion->telefono;
                    $ciudad = $direccion->ciudad;
                    $pais = $direccion->pais;
                    $infodireccion = $direccion->direccion.", ".$direccion->barrio.",".$direccion->adicional;
                } else {
                    $documento = $user->user_idnumber;
                    $nombre = $user->user_names." ".$user->user_lastnames;
                    $telefono = $user->user_phone;
                    $ciudad = "";
                    $pais = "";
                    $infodireccion = $user->user_address;
                }
                $data = array();
                $data['negocio_compra_fecha'] = date("Y-m-d");
                $data['negocio_compra_hora'] = date("H:i:s");
                $data['negocio_compra_usuario'] = $user->user_id;
                $data['negocio_compra_estado'] = 0;
                $data['negocio_compra_estado_texto'] = 'Procesando el Pago';
                $data['negocio_compra_tipodocumento'] = "-";
                $data['negocio_compra_documento'] =  $documento;
                $data['negocio_compra_razonsocial'] = "";
                $data['negocio_compra_nombre'] = $nombre;
                $data['negocio_compra_correo'] = $user->user_email;
                $data['negocio_compra_telefono'] = $telefono;
                $data['negocio_compra_celular'] = $telefono;
                $data['negocio_compra_direccion'] = $infodireccion;
                $data['negocio_compra_ciudad'] = $ciudad;
                $data['negocio_compra_pais'] = $pais;
                $data['negocio_compra_medio'] = "3";
                $data['negocio_compra_url'] = "https://baulito.co/mypurchases/";
                $data['negocio_compra_desde'] = $carrito['desde'];
                $data['negocio_compra_negocio'] = 1;
                $data['negocio_compra_tipoenvio'] = $carrito['tipoenvio'];
                $datoscompra = Compra::create($data);
                $items = $carrito['Items'];
                $subtotal = 0;
                foreach ($items as $key => $item){
                    $data = [];
                    $producto = Product::find($item['id']);
                    if($producto->state == 1){
                        if($producto->old_value > 0){
                            $valori = $producto->old_value;
                        } else {
                            $valori = $producto->value;
                        }
                        $data['negocio_compra_item_compraid'] = $datoscompra->negocio_compra_id;
                        $data['negocio_compra_item_idproducto'] = $producto->id;
                        $data['negocio_compra_item_nombre'] = $producto->name;
                        $data['negocio_compra_item_imagen'] = $producto->image_1;
                        $data['negocio_compra_item_cantidad'] = $item['cantidad'];
                        $data['negocio_compra_item_valor'] = $valori;
                        $data['negocio_compra_item_moneda'] = 'COP';
                        $data['negocio_compra_item_valorenvio'] = 0;
                        $data['negocio_compra_item_enviotipo'] = 1;
                        $query = Itemscompra::insert($data); 
                        $subtotal = $subtotal + ($valori* $item['cantidad']);
                    }
                }
                if(isset($data['negocio_compra_tipoenvio']) && $data['negocio_compra_tipoenvio'] == 1){
                    $valorenvio = 0;
                } else {
                    $valorenvio = $validacion['valorenvio'];
                }
                
                $datoscompra->negocio_compra_mipaquete = 1;
                $datoscompra->negocio_compra_subtotal = $subtotal;
                $datoscompra->negocio_compra_valor_envio = $valorenvio;
                $datoscompra->negocio_compra_valor = $subtotal+$valorenvio;
                $datoscompra->save();
                return Compra::find($datoscompra->negocio_compra_id);
            } else {
                return false;
            }
            
        } else {
            return false;
        }
    }

    public static function getCaracteristica($ids){
        $arrayc = explode(",",$ids);
        $txt = "";
        if(count($arrayc)>=1){
            foreach ($arrayc as $key => $opcion) {
                $opactual = Productosopcioncaracteristica::find($opcion);
                $cactual = $opactual->infocaracteristica();
                $txt = $txt."<strong>".$cactual->nombre.":</strong> ".$opactual->nombre." ";
            }
        }
        return $txt;

    }

    public static function getCarrito($id){
        return Compra::find($id);
    }


    public static function getpuntodeventa($producto)
    {
        $ubicacion = $producto->store_producto_ubicacion;
        
            $lugar = Campus::find($ubicacion);
            
            $aubicacion = [];
            $aubicacion['id'] = 0;
            $aubicacion['nombre'] =  $lugar->name;
            $aubicacion['pais'] = $lugar->pais;
            $aubicacion['ciudad'] = $lugar->ciudad;
            $ciudad = Mipaqueteciudades::find($lugar->ciudad);
            $aubicacion['ciudadnombre'] = $ciudad->ciudad . " , " . $ciudad->departamento;
            $aubicacion['direccion'] = $lugar->direccion;
            $aubicacion['adicional'] = $lugar->adicional;
            $aubicacion['telefono1'] = $lugar->telefono1;
            $aubicacion['telefono2'] = $lugar->telefono2;
        
        return $aubicacion;
    }
}