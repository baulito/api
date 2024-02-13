<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicios\Categoriasnegocio;

/**
 * @group  Gestion de Categorias de negocio
 * clase que permite ver las diferentes categorias en la que se encuentran los negocios del sistema
 */
class CategorianegocioController extends Controller
{
    /**
     * listado de categorias a las cuales pueden pertenecer los negocios
     *
     * @param Request $request
     * filtros para ver las categorias de los negocios
     * @return void
     */
    public function listado(Request $request){
        $data = $request->all();
        $filtros = '';
        if(isset($data['redsocial'])){
            $filtros = $filtros."categoria_sitio = '".$data['redsocial']."' ";
        } else {
            $filtros = $filtros."categoria_sitio IS NULL OR categoria_sitio = 0 ";
        }
        if(isset($data['tipo'])){
            $filtros = $filtros." AND categoria_tipo = '".$data['tipo']."' ";
        }
        $json = Categoriasnegocio::whereRaw($filtros)->get();
        return response()->json($json);
    }
}
