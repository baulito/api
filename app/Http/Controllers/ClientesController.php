<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicios\Negocios;
use App\Models\Servicios\Usuarios;

class ClientesController extends Controller
{
    public function listado(Request $request){
        $data = $request->all();
        if(isset($data['redsocial'])){
            $json = Negocios::where("registro_sitio",$data['redsocial'])->whereRaw('( registro_eliminado <> "1" OR registro_eliminado IS NULL )')->get();
        } else {
            $json = Negocios::whereRaw('(registro_sitio IS NULL OR registro_sitio = 0 )  AND( registro_eliminado <> "1" OR registro_eliminado IS NULL )')->get();
        }
        return response();
    }

    public function nuevo(Request $request){
        $data = $request->all();
        $data['user_password'] =  password_hash($data['user_password'], PASSWORD_DEFAULT);
        $data['user_fecha_creacion'] = date("Y-m-d");
        $data['user_fecha_modificacion'] = date("Y-m-d");
        $data['user_negocio'] = $data['registro_sitio'];
        $data['registro_contacto_nombre'] = $data['user_names']." ".$data['user_lastnames'];
        $data['registro_contacto_correo'] = $data['user_email'];
        $data['registro_fecha'] = date("Y-m-d");
        $data['registro_fecha_edicion'] = date("Y-m-d");
        $data['user_level'] = 2;
        $usuario = Usuarios::create($data);
        $data['registro_usuario'] = $usuario->user_id;
        /*$data['registro_usuario'] = 557;*/
        Negocios::create($data);
    }

    public function detalle($id){
        $negocio = Negocios::find($id);
        $usuario = Usuarios::find($negocio->registro_usuario);
        $json = [];
        $json['negocio'] = $negocio;
        $json['usuario'] = $usuario;
        return response()->json($json);
    }

}
