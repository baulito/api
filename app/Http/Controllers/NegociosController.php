<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicios\Negocios;
use App\Models\Servicios\Togroow\Negociobannerstore;
/**
 * @group Gestion de negocios
 */
class NegociosController extends Controller
{

    /**
     * Funcion que permite listar los negocios creados actualmente en el sistema
     *
     * @return void
     */
    public function index(){
        $json = Negocios::get();
        return response()->json($json);
    }

    /**
     * Funcion que lista un negocio en especifico
     *
     * @param [type] $id identificador del negocio que se va a mostrar
     * @urlParam id identificador del negocio que se va a mostrar
     * @return void
     */
    public function detalle($id){
        $json = Negocios::find($id);
        return response()->json($json);
    }

    public function banners($id){
        $banners = Negociobannerstore::where("negocio",$id)->get();
        foreach ($banners as $key => $banner) {
            $banner->imagen = "https://togroow.com/images/".$banner->imagen;
        }
        return response()->json($banners);
    }
}
