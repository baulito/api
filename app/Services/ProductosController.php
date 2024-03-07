<?php
namespace App\Http\Controllers\Togroow;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Mockery\Exception;
use App\Models\Servicios\Togroow\Productos;
use App\Models\Servicios\Togroow\Categoriasproductos;
use Illuminate\Support\Facades\DB;

/**
 * @group  Gestion Productos
 * clase  con los productos de togroow
 */

class ProductosController extends Controller
{
    public function listado(Request $request){
            ini_set('memory_limit', '-1');
            $data = $request->all();
            if(isset($data['busqueda'])){
                $productos = Productos::search($data['busqueda']);
            } else{
                $productos = Productos::orderBy('id','DESC');
            }
            if(isset($data['category'])){
                $productos->where("category",$data['category']);
            }
            $paginate = 40;
            if(isset($data['paginate'])){
                $paginate = $data['paginate'];
            }
            $productos = $productos->paginate($paginate);
            foreach ($productos as $key => $producto) {
                $producto = $this->getProducto($producto);
            }
        return response()->json($productos);
    }

    public function search(Request $request){
        $data = $request->all();
        ini_set('memory_limit', '-1');
        $data = $request->all();
        $pages = 20;
        if(isset($data['pages'])){
            $pages = $data['pages'];
        }
        $filtros = '';
        if(isset($data['busqueda'])){
            $busqueda = $data['busqueda'];
            if(isset($data['idnegocio'])){
                if($filtros != ''){
                    $filtros = $filtros." AND ";
                }
                $filtros = $filtros." store_producto_negocio=".$data['idnegocio'];
            }
            if(isset($data['categoria'])){
                $categoria = $data['categoria'];
                if($filtros != ''){
                    $filtros = $filtros." AND ";
                }
                $filtros = $filtros." ( store_producto_categoria=".$categoria." OR store_producto_subcategoria=".$categoria." OR store_producto_subcategoria2=".$categoria." )";
            }
            $productos = Productos::search($busqueda);
            if($filtros != ''){
                $productos->within([
                    'filters' => $filtros
                ]);
            }
            
            
        } else{
            $productos = Productos::orderBy("store_producto_id");
            if(isset($data['negocio'])){
                $productos->where("store_producto_negocio",$data['negocio']);
            }
            if(isset($data['categoria'])){
                $categoria = $data['categoria'];
                $productos->where(function($query) use ($categoria){
                    $query->where('store_producto_categoria',$categoria);
                    $query->orWhere('store_producto_subcategoria', $categoria);
                    $query->orWhere('store_producto_subcategoria2', $categoria);
                });
            }
        }
        $productos = $productos->paginate($pages);
        $categorias = [];
        $array = [];
        foreach ($productos as $key => $producto) {
            $producto = $this->getProducto($producto);
            array_push($categorias,$producto->categoria);
        }
        $array['productos'] = $productos;
        if(isset($data['categoria'])){
            $categorias = $this->getCategoria($data['categoria']);
            if($categorias->count() == 0){
                $categoriatual = Categoriasproductos::find($data['categoria']);
                $categorias = $this->getCategoria($categoriatual->store_categoria_padre);
                if($categorias->count() == 0){
                    $categorias = $categorias = $this->getCategoria(0);
                }
            }
            $array['categorias'] = $categorias;
        }else {
            if(isset($busqueda)){
                $array['categorias'] = $this->getcategorias($busqueda,$filtros);
            } else {
                $array['categorias'] = [];
            }
            
        }
        
        return response()->json($array);
    }

    public function getcategorias($busqueda,$filtros){
        ini_set('memory_limit', '-1');
        $productos = Productos::search($busqueda);
        if($filtros != ''){
            $productos->within([
                'filters' => $filtros,    
            ]);
        }
        $productos = $productos->get();
        $categorias = [];
        $categoriasid = [];
        foreach ($productos as $key => $producto) {
            $producto = $this->getProducto($producto);
            if(!in_array($producto->store_producto_categoria,$categoriasid)){
                array_push($categoriasid,$producto->store_producto_categoria);
                array_push($categorias,$producto->categoria);
            }
            
        }
        return $categorias;
    }

    public function getCategoria($padre){
        $categorias = Categoriasproductos::where("store_categoria_padre",$padre)
            ->whereExists(function ($query) {
                    $query->select("*")
                    ->from('store_producto')
                    ->where("store_producto_estado",1)
                    ->where(function($query2){
                        $query2->whereColumn('store_producto_categoria','store_categoria_id');
                        $query2->orWhereColumn('store_producto_subcategoria', 'store_categoria_id');
                        $query2->orWhereColumn('store_producto_subcategoria2', 'store_categoria_id');
                    })
                    ->whereExists(function ($query3) {
                        $query3->select("*")
                            ->from('registro')
                            ->whereColumn('store_producto_negocio', 'registro_id');
                            $query3->where(function($query5){
                                $query5->where('registro_eliminado',"!=",1)
                                ->orWhereNull('registro_eliminado');
                            });
                            $query3->whereExists(function ($query4) {
                                $fecha = date("Y-m-d");
                                $query4->select("*")
                                    ->from('negocio_mercadopago')
                                    ->whereColumn('registro_id','negocio_mercadopago_negocio');
                                //$query4->where('negocio_mercadopago_fecharenovacion','>','"'.$fecha.'"');
                            });
                    });
                    
                })
        ->get();
        return $categorias;
    }

    public function detailProduct($id){
        $producto = Productos::find($id);
        $producto = $this->getProducto($producto);
        return response()->json($producto);
    }
    

    public function getProducto($producto){
        $producto['store_producto_nombre'] = html_entity_decode($producto->store_producto_nombre);
        $producto['store_producto_descripcion'] = $producto->store_producto_descripcion;
        $producto['miniatura'] = "https://togroow.com/images/".$producto->store_producto_imagen;
        $producto['store_producto_imagen'] = "https://togroow.com/images/".$producto->store_producto_imagen;
        for ($i=2; $i < 10 ; $i++) { 
            $imagecolum =  'store_producto_imagen'.$i;
            if($producto->$imagecolum != ''){
                $producto['store_producto_imagen'.$i] = "https://togroow.com/images/".$producto->$imagecolum;
            }
            
        }
        $producto['categoria'] = $producto->categoria;
        $producto['subcategoria'] =  $producto->subcategoria;
        $producto['subcategoria2'] = $producto->subcategoria2;
        $producto['negocio'] = $producto->negocio;
        $cantidades = $producto->cantidades();
        $producto['inventario'] = $cantidades;
        $producto['valores'] = $this->getValores($producto);
        return $producto;
    }

    public function getValores($producto){
        $valores = [];
        $valores['etkcolor'] = "";
        $valores['etktexto'] = '';
        $valores['etk'] = 0;
        $valores['valor'] = "$".number_format($producto->store_producto_valor);
        $valores['value'] = $producto->store_producto_valor;
        $cantidad = $producto->store_producto_cantidad;
    
        if( isset($producto->inventario->cantidades) && count($producto->inventario->cantidades) > 0 ){
            $cantidad = 0;
            foreach ($producto->inventario->cantidades as $key => $cantidadp) {
                $cantidad = $cantidad +  $cantidadp->cantidad;
            }
        }

        if($producto->store_producto_tipo == 3){ 
            $valores['etkcolor'] = "#1f5796";
            $valores['etktexto'] = 'Cotizable';
            $valores['etk'] = 1;
            $valores['valor'] =  "Cotizable";
        } else if($producto->store_producto_tipo == 5){ 
            $valores['etkcolor'] = "#48008c";
            $valores['etktexto'] = 'Compra Externa';
             $valores['etk'] = 1;
             $valores['valor'] =  "Compra Externa";
        } else if( $cantidad < 1 && $producto->store_producto_tipo != 2  && $producto->store_producto_tipoproducto != 2  ){ 
            $valores['etkcolor'] = "#f2745e";
            $valores['etktexto'] = 'Agotado';
            $valores['valor'] = "Agotado";
             $valores['etk'] = 1;
        } else if($producto->store_producto_valor < 1 ){ 
            $valores['etkcolor'] = "#f2745e";
            $valores['etktexto'] = 'No disponible';
            $valores['etk'] = 1;
            $valores['valor'] = 'No disponible';
        } else if( $producto->store_producto_promocion_valor > 0 && $producto->store_producto_promocion_inicio <= date("Y-m-d") && $producto->store_producto_promocion_fin >= date("Y-m-d")  ) { 
            $valores['etkcolor'] = "#669e1e";
            $valores['etktexto'] = $producto->store_producto_promocion_texto;
            if($valores['etktexto'] == ''){
                $valores['etktexto'] = 'Promoción';
            }
            $valores['valor'] = "$".number_format($producto->store_producto_promocion_valor);
            $valores['valorantes'] = "$".number_format($producto->store_producto_valor);
            $valores['etk'] = 1;
        } else if($producto->store_producto_etiqueta) { 
            $valores['etkcolor'] = $producto->store_producto_etiqueta_color;
            $valores['etktexto'] = $producto->store_producto_etiqueta;
            $valores['etk'] = 1;
        }

        return $valores;
    }

    public function getCantidades(){

    }

    public function cargaScout(Request $request){
        $data = $request->all();

        $productos = Productos::where("store_producto_estado",1);
        $productos->whereExists(function ($query) {
            $query->select(DB::raw(1))
                  ->from('registro')
                  ->whereColumn('store_producto_negocio', 'registro_id')
                  ->whereNull('registro_eliminado','=','','and');
        });
        $productos->whereExists(function ($query) {
            $query->select(DB::raw(1))
                  ->from('negocio_mercadopago')
                  ->whereColumn('store_producto_negocio','negocio_mercadopago_negocio')
                  ->where('negocio_mercadopago_token','<>', '','and')
                  ->where('negocio_mercadopago_fecharenovacion','>=',date("Y-m-d"));
        });

        if(isset($data['negocio'])){
            $productos->where("store_producto_negocio",$data['negocio']);
        } 
        $productos->orderBy("store_producto_id",'DESC');
        //$data = $productos->get();
        /*echo "<pre>";
        print_r($data);
        echo "</pre>";;*/
        //echo $data->count();
        $productos->searchable();
    }
    
}
