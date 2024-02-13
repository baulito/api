<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicios\Tipoelementos;

class TipoelementoController extends Controller
{
    public function listado(Request $request){
        $data = $request->all();
        $json = [];
        if(isset($data['redsocial'])){
            $json = Tipoelementos::where("red",$data['redsocial'])->get();
        }
        return response()->json($json);
    }

    public function crear(Request $request){
        $data = $request->all();
        Tipoelementos::create($data);
    }

    public function editar(Request $request,$id){
        $data = $request->all();
        $element = Tipoelementos::findOrFail($id);
        $element->update($data);
    }
    public function eliminar($id){
        Tipoelementos::destroy($id);
    }

}
