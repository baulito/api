<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicios\Togroow\Pais;
use App\Models\Servicios\Togroow\Ciudad;
use App\Models\Servicios\Sportodos\SpCiudad;
use App\Models\Servicios\Sportodos\SpZona;
use Mockery\Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * @group  Listado de lugares
 * 
 * clase que retorna la informacion de los paises y ciudades cargados en el sistema
 */
class LugaresController extends Controller
{

    /**
     *funcion que retorna el listado de paises cargados en el sistema
     *
     * @return void
     */
    public function paises()
    {
        $json = Pais::orderBy("pais_nombre", "ASC")->get();   
        return response()->json($json, 200, [], JSON_NUMERIC_CHECK);;
    }

    /**
     *funcion que retorna el listado de ciudades cargadas en el  sistema
     *
     * @return void
     */
    public function index()
    {
        $json = Pais::orderBy("pais_nombre", "ASC")->get();
        return response()->json($json);
    }

    /**
     * funcion que retorna el listado de ciudades de un pais en especifico
     *
     * @urlParam [type] $pais  Example: CO
     * identificador del pais a retornar sus ciudades
     * @return void
     */
    public function ciudades($pais)
    {
        $json = [];
        if ($pais) {
            $res = Ciudad::where('pais_id', $pais)->get();
            $json = $res;
        }
        return response()->json($json);
    }
}