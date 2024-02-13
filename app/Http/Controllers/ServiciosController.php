<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicios\Sportodos\SpServicio;

class ServiciosController extends Controller
{
    public function __construct() {
        //$this->middleware('jwt', ['except' => ['listado']]);
    }
    // GET
    public function listado(Request $request){
        $json=[];
        $servicios = SpServicio::get();
        foreach($servicios as $servicio){
            array_push($json,$servicio);
        }
        return response()->json($json);
    }
    //POST
    public function crear(Request $request){
        $data = $request->all();
        $servicio = SpServicio::create($data);
        response()->json($Servicio);
    }

    // PUT
    public function editar(Request $request,$id){
        $data = $request->all();
        $element = SpServicio::findOrFail($id);
        $element->update($data);
    }
    // GET
    public function detalle($id){
        $json = SpServicio::find($id);
        return response()->json($json);
    }
    // DELETE
    public function eliminar($id){
        SpServicio::destroy($id);
    }

}
