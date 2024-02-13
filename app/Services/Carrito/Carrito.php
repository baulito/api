<?php 
namespace App\Services\Carrito;

use App\Models\Servicios\Togroow\Compra;
use App\Models\Servicios\Togroow\Itemscompra;
use App\Models\Servicios\Togroow\Negocio;
use App\Models\Servicios\Togroow\Productos;
use App\Models\Servicios\Togroow\Mipaquete;
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
        $negocio = $carrito['negocio'];
        $items = $carrito['Items'];
        $productos = [];
        $error = 0;
        if(count( $items) == 0){
            $error = 1;
        }
        $productoactual = Productos::find($items[0]['id']);
        foreach ($items as $key => $item) {
            $producto = Productos::find($item['id']);
            $producto->cantidaditem = $item['cantidad'];
            $producto->valorcompra = $item['valor'];
            $carrito['Items'][$key]['disponibilidad'] = 1;
            if($producto->store_producto_estado == 0){ 
                $carrito['Items'][$key]['disponibilidad'] = 0;
                $error = 1;
            } else if( $item['caracteristica'] != null){
                $cantidad = Productoscantidades::where('idproducto',$producto->store_producto_id)->where("ids_opciones",$item['caracteristica'])->first();
                if(!isset($cantidad) || $cantidad->cantidades < $item['cantidad'] ){
                    $carrito['Items'][$key]['disponibilidad'] = 0;
                    $error = 1;
                }
            } else if($producto->store_producto_cantidad < $item['cantidad']){
                $carrito['Items'][$key]['disponibilidad'] = 0;
                $error = 1;
            }
            array_push($productos,$producto);
        }
        //$infoMipaquete = Mipaquete::where("negocio",$negocio)->get();
        $infoMipaquete = Mipaquete::where("correo","storeamberes@outlook.com")->get();
        $paquetes = Empaque::calcularempaque($productos);
        $valorenvio = [];
        $errordireccion = 0;
        if(isset($infoMipaquete[0])){
            $mipaquete = $infoMipaquete[0];
            $api = $mipaquete->apikey;
            $direccion = Useraddress::where("principal",1)->where("usuario",$iduser)->get();
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
            $puntodeventa = self::getpuntodeventa($productoactual);
        }
        $carrito['tipoenvio'] = $tipoenvio;
        $carrito['valorenvio'] = $valortotalenvio;
        //$carrito['dataenvio'] =  $dataenvios;
        $carrito['puntoventa'] = $puntodeventa;
        $carrito['sindireccion'] = $errordireccion;
        $carrito['error']  = $error; 
        return $carrito;
    }

    public static function pagar($carrito,$iduser){
        $newcarrito = self::guardarCarrito($carrito,$iduser);
        return $newcarrito;
    }
    public static function guardarCarrito($carrito,$user){
        $negocio = $carrito['negocio'];
        $validacion =  self::validar($carrito,$user->user_id,$carrito['tipoenvio']);
        if($validacion['error'] == 0   || ( $validacion['sindireccion'] == 1 && isset( $carrito['tipoenvio']) &&  $carrito['tipoenvio'] == 1 )){
            $direcciona= Useraddress::where("principal",1)->where("usuario",$user->user_id)->get();
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
                $data['negocio_compra_negocio'] = $negocio;
                $data['negocio_compra_tipoenvio'] = $carrito['tipoenvio'];
                $datoscompra = Compra::create($data);
                $items = $carrito['Items'];
                $subtotal = 0;
                foreach ($items as $key => $item){
                    $data = [];
                    $producto = Productos::find($item['id']);
                    if($producto->store_producto_estado == 1){
                        if($producto->store_producto_promocion == 1 && $producto->store_producto_promocion_valor > 0 && $producto->store_producto_promocion_inicio <= date("Y-m-d") && $producto->store_producto_promocion_fin >= date("Y-m-d")  ) { 
                            if($producto->store_producto_promocion_tipo == 1){
                                $valori = $producto->store_producto_promocion_valor;
                                $moneda = "COP";
                            } else if($producto->store_producto_promocion_tipo == 3){
                                $valori = $producto->store_producto_promocion_valor;
                                $moneda = "USD";
                            } else {
                                $valori = $producto->store_producto_valor  - (($producto->store_producto_valor/100)*$producto->store_producto_promocion_valor);
                            }
                        } else { 
                            if($producto->store_producto_moneda == 2){
                                $moneda = "USD";
                            } else {
                                $moneda = "COP";
                            }
                            $valori = $producto->store_producto_valor; 
                        }
                        $data['negocio_compra_item_compraid'] = $datoscompra->negocio_compra_id;
                        $data['negocio_compra_item_idproducto'] = $producto->store_producto_id;
                        $data['negocio_compra_item_nombre'] = $producto->store_producto_nombre;
                        $data['negocio_compra_item_imagen'] = $producto->store_producto_imagen;
                        $data['negocio_compra_item_cantidad'] = $item['cantidad'];
                        $data['negocio_compra_item_valor'] = $valori;
                        $data['negocio_compra_item_moneda'] = $moneda;
                        if($item['caracteristica']){
                            $data['caracteristicas'] = $item['caracteristica'];
                            $data['caracteristicastxt'] = self::getCaracteristica($item['caracteristica']);
                        }
                        $data['negocio_compra_item_valorenvio'] = 0;
                        $data['negocio_compra_item_enviotipo'] = $producto->store_producto_envio_tipo;
                        if($producto->store_producto_envio_empresa == 1){
                            $data['negocio_compra_item_mipaquete'] = 1;
                            $mipaquete = 1;
                        } else {
                            $data['negocio_compra_item_mipaquete'] = 0;
                        }
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
        if ($ubicacion == 0 || $ubicacion == null) {
            $lugar = Mipaquete::where("negocio", $producto->store_producto_negocio)->first();
            $aubicacion = [];
            $aubicacion['id'] = 0;
            $aubicacion['negocio'] = $lugar->negocio;
            $aubicacion['nombre'] =  "Tienda Principal";
            $aubicacion['pais'] = $lugar->pais;
            if ($aubicacion['pais'] == "CO") {
                $aubicacion['pais'] = "Colombia";
            }
            $aubicacion['ciudad'] = $lugar->ciudad;
            $ciudad = Mipaqueteciudades::find($lugar->ciudad);
            $aubicacion['ciudadnombre'] = $ciudad->ciudad . " , " . $ciudad->departamento;
            $aubicacion['direccion'] = $lugar->direccion;
            $aubicacion['adicional'] = $lugar->adicional;
            $aubicacion['telefono1'] = $lugar->telefono1;
            $aubicacion['telefono2'] = $lugar->telefono2;
        } else {
            $lugar = Negociopuntos::find($ubicacion);
            $aubicacion = [];
            $aubicacion['id'] = 0;
            $aubicacion['negocio'] = $lugar->negocio;
            $aubicacion['nombre'] =  $lugar->nombre;
            $aubicacion['pais'] = $lugar->pais;
            $aubicacion['ciudad'] = $lugar->ciudad;
            $ciudad = Mipaqueteciudades::find($lugar->ciudad);
            $aubicacion['ciudadnombre'] = $ciudad->ciudad . " , " . $ciudad->departamento;
            $aubicacion['direccion'] = $lugar->direccion;
            $aubicacion['adicional'] = $lugar->adicional;
            $aubicacion['telefono1'] = $lugar->telefono1;
            $aubicacion['telefono2'] = $lugar->telefono2;
        }
        return $aubicacion;
    }
}