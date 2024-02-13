<?php
namespace App\Http\Controllers\Togroow;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Servicios\Togroow\Productos;
use App\Models\Servicios\Togroow\Categoriasproductos;
use App\Models\Servicios\Togroow\Productoscantidades;
use App\Models\Servicios\Togroow\Mipaqueteciudades;
use App\Models\Servicios\Togroow\Negociopuntos;
use App\Models\Servicios\Togroow\Mipaquete;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Services\Images\Images;
use Illuminate\Support\Facades\Cache;

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
                $busqueda = $data['busqueda'];
            } else{
                $busqueda='';
            }
            $productos = Productos::search($busqueda);
            $productos = $productos->paginate(20);
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
            
            $productos = Productos::orderBy("store_producto_id","DESC");
            $productos->where("store_producto_estado",1);
            $productos->where(function($query) {
                $query->where("store_producto_envio_dimenciones","<>","xx");
                $query->where("store_producto_envio_dimenciones","<>",null);
            });
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
            if(isset($data['agotado']) && $data['agotado'] == 1 ){
                $productos->where(function($query) use ($categoria){
                    $query->whereExists(function ($query2) {
                        $query2->select("store_producto_cantidades.idproducto")
                              ->from('store_producto_cantidades')
                              ->whereRaw('store_producto_cantidades.idproducto = store_producto_id')
                              ->where("store_producto_cantidades.cantidades",">",0);
                    });
                    $query->orWhere('store_producto_cantidad','>',0);
                   
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
        $pro = Productos::find($id);
        Cache::flush();
        $producto = $this->getProducto($pro);
        return response()->json($producto);
    }

    
    public function detail($id){
        $pro = Productos::find($id);
        Cache::flush();
        $producto = $this->getProducto($pro);
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
        $producto['puntosventa'] = "holamundo";
        $producto['puntoventa'] = $this->getpuntodeventa($producto);
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
        if( isset($producto->inventario['cantidades']) && count($producto->inventario['cantidades']) > 0 ){
            
            $cantidad = 0;
            foreach ($producto->inventario['cantidades'] as $key => $cantidadp) {
                $cantidad = $cantidad +  $cantidadp['cantidad'];
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

    public function saveProduct(Request $request){
        $data = $request->all();
        if(isset($data['id']) && $data['id'] > 0 ){
            $id = $this->update($request);
            $message = "Producto Actualizado";
        } else {
            $id = $this->insert($request);
            $message = "Producto Creado";
        }
        return response()->json(["idproducto"=>$id,"message"=>$message]);
    }

    public function insert($request){
        $data = $request->all();
        if(isset($data['store_producto_imagen'])){
            $data['store_producto_imagen'] = Images::uploadImage($request->file('store_producto_imagen'));
        }
        for ($i=2; $i < 10; $i++) { 
            $nameimage = 'store_producto_imagen'.$i;
            if(isset($data[$nameimage])){
                $data[$nameimage] = Images::uploadImage($request->file($nameimage));
            }
        }
        $producto = Productos::create($data);
        $this->saveCantidades($producto->store_producto_id,$data);
        return $producto->store_producto_id;
    }

    public function update($request){
        $data = $request->all();
        $producto = Productos::find($data['id']);
        if(isset($data['store_producto_imagen'])){
            if($producto->store_producto_imagen != ''){
                Storage::delete(public_path('/images/'.$producto->store_producto_imagen));
            }
            $data['store_producto_imagen'] = Images::uploadImage($request->file('store_producto_imagen'));
        } else {
            $data['store_producto_imagen'] = $producto->store_producto_imagen;
        }
        for ($i=2; $i < 10; $i++) { 
            $nameimage = 'store_producto_imagen'.$i;
            if(isset($data[$nameimage])){
                if($producto->$nameimage != ''){
                    Storage::delete(public_path('/images/'.$producto->$nameimage));
                }
                $data[$nameimage] = Images::uploadImage($request->file($nameimage));
            } else {
                $data[$nameimage] = $producto->$nameimage;
            }
        }
        $producto->update($data);
        $this->saveCantidades($producto->store_producto_id,$data);
        return $producto->store_producto_id;
    }

    public function saveCantidades($producto,$data){
		$cantidades = $data['cantidadesseleccionadas'];
		$cantidades = json_decode($cantidades);
        Productoscantidades::where("idproducto",$producto)->delete();
		$array = [];
		$array['idproducto'] = $producto;
		foreach ($cantidades as $ids => $cantidad) {
			$array['ids_opciones']  = str_replace("_",",",$ids);
			$array['cantidades'] = $cantidad;
			Productoscantidades::create($array);
		}
	}
    
    public function getpuntodeventa($producto){
        $ubicacion = $producto->store_producto_ubicacion;
        if($ubicacion == 0 || $ubicacion == null){
            $lugar = Mipaquete::where("negocio",$producto->store_producto_negocio)->first();
            $aubicacion = [];
            $aubicacion['id'] = 0 ;
            $aubicacion['negocio'] = $lugar->negocio ;
            $aubicacion['nombre']=  "Tienda Principal" ;
            $aubicacion['pais']= $lugar->pais;
            if($aubicacion['pais'] == "CO"){
                $aubicacion['pais'] = "Colombia";
            }
            $aubicacion['ciudad']= $lugar->ciudad;
            $ciudad = Mipaqueteciudades::find($lugar->ciudad);
            $aubicacion['ciudadnombre']= $ciudad->ciudad." , ".$ciudad->departamento;
            $aubicacion['direccion']= $lugar->direccion;
            $aubicacion['adicional']= $lugar->adicional;
            $aubicacion['telefono1']= $lugar->telefono1;
            $aubicacion['telefono2']= $lugar->telefono2;
        } else{
            $lugar = Negociopuntos::find($ubicacion);
            $aubicacion = [];
            $aubicacion['id'] = 0 ;
            $aubicacion['negocio'] = $lugar->negocio;
            $aubicacion['nombre']=  $lugar->nombre;
            $aubicacion['pais']= $lugar->pais;
            $aubicacion['ciudad']= $lugar->ciudad;
            $ciudad = Mipaqueteciudades::find($lugar->ciudad);
            $aubicacion['ciudadnombre']= $ciudad->ciudad." , ".$ciudad->departamento;
            $aubicacion['direccion']= $lugar->direccion;
            $aubicacion['adicional']= $lugar->adicional;
            $aubicacion['telefono1']= $lugar->telefono1;
            $aubicacion['telefono2']= $lugar->telefono2;
        }
        return $aubicacion;
        
    }
}
