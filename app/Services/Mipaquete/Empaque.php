<?php 
namespace App\Services\Mipaquete;

use App\Models\Servicios\Togroow\Compra;
use App\Models\Mipaquete;
use App\Models\Campus;


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
            $ubicacion = $producto->campus;
            $punto = Campus::find($ubicacion);
            if(isset($punto)){
                $ciudad = $punto->city;
            }
            if(!isset($dimensiones[$ubicacion])){
                $dimensiones[$ubicacion] = [];
                $dimensiones[$ubicacion]['productos'] = [];
                $dimensiones[$ubicacion]['origen'] = $ciudad;
            }
            $dimensionesp = explode("x",$producto->store_producto_envio_dimenciones);
            $dimensiones[$ubicacion]['productos'][$key] = [];
            $dimensiones[$ubicacion]['productos'][$key]['ancho']= (float)$producto->height;
            $dimensiones[$ubicacion]['productos'][$key]['largo']= (float)$producto->long;
            $dimensiones[$ubicacion]['productos'][$key]['alto']= (float)$producto->width;
            $dimensiones[$ubicacion]['productos'][$key]['peso']= (float)$producto->wheight;
            $dimensiones[$ubicacion]['productos'][$key]['valor']= (float)$producto->value;
            $dimensiones[$ubicacion]['productos'][$key]['cantidad'] = $producto->cantidaditem;
        }
        return $dimensiones;
    }

    public static function calcularCaja($dimensiones){
        $paquetes = [];
        $contador = 0;
        foreach ($dimensiones as $campus => $paquete) {
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
            $array['campus'] = $campus;
            $paquetes[$contador] = $array;
            $contador++;
        }
        return $paquetes; 
    } 
}