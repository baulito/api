<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicios\Negocios;
use App\Models\Servicios\Togroow\Notificaciones;
use App\Models\Servicios\Togroow\Usuarios;
/**
 * @group  Gestion de Notificaciones
 * clase  con los servicios listar, editar, eliminar las notificaciones
 */
class NotificacionesController extends Controller
{

    /**
     * Funcion para listar las notificaciones del usuario que esta autenticado
     * @return void
     */
    public function index(){
        $user = auth()->user()->user_id;
        $notificaciones = Notificaciones::where("dest_user_id",$user)->orderBy("created_at","DESC")->get(); 
        foreach ($notificaciones as $key => $notificacion) {
            $usuario = Usuarios::where("user_id",$notificacion->source_user_id)->first();
            if(isset($usuario)){
                //print_r($usuario->user_id);
                $usuariodata = [];
                $usuariodata['user_id'] = (int) $usuario->user_id;
                $usuariodata['nombre'] = html_entity_decode($usuario->user_names." ".$usuario->user_lastnames);
                if($usuario->user_foto != ''){
                    $usuariodata['foto'] = $this->rutarecursos."/images/".$usuario->user_foto;
                } else {
                    $usuariodata['foto'] = $this->rutarecursos."/skins/sistem/images/perfil.jpg";
                }
                $notificaciones[$key]->source = $usuariodata;
            } else {
                $usuariodata = [];
                $usuariodata['user_id'] = (int) 0;
                $usuariodata['nombre'] = "Anónimo";
                $usuariodata['foto'] = $this->rutarecursos."/skins/sistem/images/perfil.jpg";
                $notificaciones[$key]->source = $usuariodata;
            }
            $content = [];
            $notificaciones[$key]->content =  $content;
        }
        return response()->json($notificaciones);
    }

    /**
     * Funcion para cambiar el estado de  una notificacion
     *
     * @param [type] $id identificador de la notificacion a editar
     * @urlParam id identificador de la notificacion a editar
     * @return void
     */
    public function editar($id){
        $notificacion = Notificaciones::find($id);
        if(isset($notificacion)){
            $user = auth()->user()->user_id;
            if($user = $notificacion->dest_user_id){
                $notificacion->estado = 1;
                $notificacion->save();
                return response()->json(['message' => 'Notificación leida'], 200);
            } else {
                return response()->json(['message' => 'No dispone de permisos para editar la notificación'], 500);
            }
        } else {
            return response()->json(['message' => 'No se encontro la notificación'], 500);
        }
    }

    /**
     * Funcion para eliminar una notificacion
     *
     * @param [type] $id identificador de la notificacion a eliminar
     * @urlParam id identificador de la notificacion a eliminar
     * @return void
     */
    public function eliminar($id){
        $notificacion = Notificaciones::find($id);
        if(isset($notificacion)){
            $user = auth()->user()->user_id;
            if($user = $notificacion->dest_user_id){
                Notificaciones::destroy($id);
                return response()->json(['message' => 'Notificación Eliminada'], 202);
            } else {
                return response()->json(['message' => 'No dispone de permisos para eliminar la notificación'], 500);
            }
        } else {
            return response()->json(['message' => 'No se encontro la notificación'], 500);
        }
       
    }
}
