<?php
namespace App\Http\Controllers\Togroow;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Mockery\Exception;
use App\Models\Servicios\Togroow\Compra;
use App\Models\Servicios\Togroow\Negocio;
use App\Models\Servicios\Togroow\Productos;
use App\Services\Mipaquete\Envio;
use App\Servicios\Mipaquete;

/**
 * @group  Gestion Productos
 * clase  con las ventas realizadas en togroow
 */

class VentasController extends Controller
{
    public function listado(Request $request){
        $data = $request->all();
        $user = auth()->user()->user_id;
            $ventas = Compra::where("negocio_compra_estado","<>","0");
            if(isset($data['desde'])){
                $ventas->where("negocio_compra_fecha",">=",$data['desde']);
            }
            if(isset($data['hasta'])){
                $ventas->where("negocio_compra_fecha","<=",$data['hasta']);
            }
            $ventas = $ventas->orderBy("negocio_compra_fecha","DESC")->get();
            $datos = [];
            foreach ($ventas as $key => $venta) {
                $datos[$key] = $this->ventaformat($venta);
            }
            return response()->json($datos);
    }

    public function listado2(Request $request){
        $data = $request->all();
            $ventas = Compra::where("negocio_compra_estado","<>","0");
            if(isset($data['desde'])){
                $ventas->where("negocio_compra_fecha",">=",$data['desde']);
            }
            if(isset($data['hasta'])){
                $ventas->where("negocio_compra_fecha","<=",$data['hasta']);
            }
            $ventas = $ventas->orderBy("negocio_compra_fecha","DESC")->orderBy("negocio_compra_id","DESC")->get();
            $datos = [];
            foreach ($ventas as $key => $venta) {
                $datos[$key] = $this->ventaformat($venta);
            }
            return response()->json($datos);
        
    }

    public function ventaformat($venta){
        $array = [];
        $array['compra_id'] = $venta->negocio_compra_id;
        $array['fecha'] = $venta->negocio_compra_fecha;
        $array['hora'] = $venta->negocio_compra_hora;
        $array['documento'] = $venta->negocio_compra_documento;
        $array['nombre'] = html_entity_decode($venta->negocio_compra_nombre);
        $array['correo'] = $venta->negocio_compra_correo;
        $array['telefono'] = $venta->negocio_compra_telefono;
        $array['celular'] = $venta->negocio_compra_celular;
        $array['direccion'] = $venta->negocio_compra_direccion;
        $array['pais'] = $venta->negocio_compra_pais;
        $array['ciudad'] = $venta->negocio_compra_ciudad;
        $array['lugar'] = $venta->negocio_compra_lugar;
        $array['observacion'] = $venta->negocio_compra_observacion;
        $array['estadopagocode'] = $venta->negocio_compra_estado;
        $array['estadopago'] = $venta->negocio_compra_estado_texto;
        $array['mipaquete'] = $venta->negocio_compra_mipaquete;
        $array['items'] = [];
        foreach ($venta->items as $key => $item) {
            $producto = Product::find($item->negocio_compra_item_idproducto);
            $array['items'][$key] = [];
            if(isset($producto)){
                $array['items'][$key]['sku'] = $producto->sku;
                $array['items'][$key]['campus'] = $producto->campusdetail();
            }
            //$array['items'][$key]['sku'] = $producto->sku;
            $array['items'][$key]['nombre'] = html_entity_decode($item->negocio_compra_item_nombre);
            $array['items'][$key]['valor'] = $item->negocio_compra_item_valor;
            $array['items'][$key]['moneda'] = $item->negocio_compra_item_moneda;
            $array['items'][$key]['cantidad'] = $item->negocio_compra_item_cantidad;
        }
        $array['subtotal'] = (float)$venta->negocio_compra_subtotal;
        $array['valor_envio'] = (float)$venta->negocio_compra_valor_envio;
        $array['total'] = (float)$venta->negocio_compra_valor;
        if($venta->negocio_compra_mipaquete == 1){
            $array['informacionenvio'] = Envio::consultarEnvios($venta->negocio_compra_id);
        }
        return $array;
    }

    public function actualizarbaulito(){
        $ventas = Compra::where("negocio_compra_negocio",1384)->where("negocio_compra_estado","1")->get();
        foreach ($ventas as $key => $venta) {
            $venta->items();
            foreach ($venta->items as $key => $item) {
                $producto = Productos::find($item->negocio_compra_item_idproducto);
                if(isset($producto)){
                    $producto->store_producto_vendido = 1;
                    $producto->store_producto_estado = 0;
                    $producto->save();
                }
            }
        }

    }

    public function generarEnvio($id){
        Envio::generarEnvio($id);
    }
    public function cancelarEnvio($id){
        Envio::cancelarEnvio($id);
    }
}