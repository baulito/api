<?php
namespace App\Http\Controllers\Togroow;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Mockery\Exception;
use App\Models\Servicios\Togroow\Categoriasproductos;
/**
 * @group  Categoria de productos
 */

class CategoriasstoreController extends Controller
{


    public function Categorias(Request $request){
        $data = $request->all();
        $padre = 0;
        if(isset($data['padre'])){
            $padre = $data['padre'];
        }
        $tipo = 1;
        if(isset($data['tipo'])){
            $tipo = $data['tipo'];
        }
        $categorias = Categoriasproductos::where("store_categoria_padre",$padre)->where("store_categoria_tipo",$tipo)->get();
        return response()->json($categorias);
    }
    

}