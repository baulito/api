<?php 
namespace App\Services\Mipaquete;

use App\Models\Servicios\Togroow\Compra;
use App\Models\Servicios\Togroow\Negocio;
use App\Models\Servicios\Togroow\Mipaquete;
use App\Models\Servicios\Togroow\Negociopuntos;


class Empaque
{
    

    public static function calcularempaque($productos){
        $dimenciones = self::dimencionesProductos($productos);
        $caja = self::calcularCaja($dimenciones);
        return $caja;
    }

    public static function dimencionesProductos($productos){
        $dimensiones = [];
        foreach ($productos as $key => $producto) {
            $ubicacion = 0; 
            $ciudad = 0;  
            if($producto->store_producto_ubicacion > 0){
                $ubicacion = $producto->store_producto_ubicacion;
                $punto = Negociopuntos::find($ubicacion);
                if(isset($punto)){
                    $ciudad = $punto->ciudad;
                }
            } else {
                $infoMipaquete = Mipaquete::where("negocio",$producto->store_producto_negocio)->get();
                if(isset($infoMipaquete[0])){
                    $ciudad = $infoMipaquete[0]->ciudad;
                }
            }
            if(!isset($dimensiones[$ubicacion])){
                $dimensiones[$ubicacion] = [];
                $dimensiones[$ubicacion]['productos'] = [];
                $dimensiones[$ubicacion]['origen'] = $ciudad;
            }
            $dimensionesp = explode("x",$producto->store_producto_envio_dimenciones);
            $dimensiones[$ubicacion]['productos'][$key] = [];
            $dimensiones[$ubicacion]['productos'][$key]['ancho']= (float)$dimensionesp[2];
            $dimensiones[$ubicacion]['productos'][$key]['largo']= (float)$dimensionesp[1];
            $dimensiones[$ubicacion]['productos'][$key]['alto']= (float)$dimensionesp[0];
            $dimensiones[$ubicacion]['productos'][$key]['peso']= (float)$producto->store_producto_envio_peso;
            $dimensiones[$ubicacion]['productos'][$key]['valor']= (float)$producto->valorcompra;
            $dimensiones[$ubicacion]['productos'][$key]['cantidad'] = $producto->cantidaditem;
        }
        return $dimensiones;
    }

    public static function calcularCaja($dimensiones){
        $paquetes = [];
        $contador = 0;
        foreach ($dimensiones as $key => $paquete) {
            $ancho = 0;
            $largo = 0;
            $alto = 0;
            $peso = 0;
            $valor = 0;
            $origen = $paquete['origen'];
            foreach ($paquete['productos'] as $key => $dimension) {
                if($ancho < $dimension['ancho']){
                    $ancho = (float)  $dimension['ancho'];
                }
                if($largo < $dimension['largo']){
                    $largo = (float)  $dimension['largo'];
                }
                $alto = $alto +($dimension['alto'] * $dimension['cantidad'] );
                $peso =  $peso + ($dimension['peso'] * $dimension['cantidad'] );
                $valor =  $valor + ($dimension['valor'] * $dimension['cantidad'] );
            }
            $array = [];
            $array['ancho'] =  $ancho;
            $array['largo'] = $largo;
            $array['alto'] = $alto;
            $array['peso'] = $peso;
            $array['valor'] = $valor;
            $array['origen'] = $origen;
            $paquetes[$contador] = $array;
            $contador++;
        }
        return $paquetes; 
    } 
}