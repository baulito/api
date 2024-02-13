<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicios\Togroow\Post;
use App\Models\Servicios\Togroow\Comentarios;
use App\Models\Servicios\Togroow\Usuarios;
use App\Models\Servicios\Togroow\Likes;
use Illuminate\Support\Facades\Auth;

/**
 * @group  Gestion de Comentarios
 * clase que permite la creacion de los comentarios que se ingresan a los diferentes elementos dentro del sistema
 */
class ComentariosController extends Controller
{
    /**
     * funcion que retorna el listado de comentarios en el sistema para un elemento especifico
     *
     * @param [type] $id
     * identificador del elemento al cual se quieren los comentarios
     * @param Request $request
     * varriable con el tipo de comentario que se quiere retornar
     * @return void
     */
    public function listado($id,Request $request){
        $data = $request->all();
        if(isset($data['tipo'])){
            $tipo = $data['tipo'];
        } else {
            $tipo = 2;
        }
        $comentarios = Comentarios::getComentarios($id,$tipo);
        $datos = [];
        foreach ($comentarios as $key => $comentario) {
            $datos[$key] = $this->comentarioformat($comentario);
        }
        return response()->json($datos);
    }

    /**
     * funcion para crear un comentario
     *
     * @param [type] $id
     * identificador el contenido al cual se le decea hacer el comentario
     * @param Request $request
     * variable con la informacion del comentario a ingresar
     * @return void
     */
    public function create($id,Request $request){
        $data = $request->all();
        $user = auth()->user()->user_id;
        if(isset($data['comment_user']) && $user == $data['comment_user'] ){
            if(isset($data['comment_parent']) && $data['comment_parent'] > 0){
                $idcontenido = $data['comment_parent'];
            }
            $tipo = 2;
            if(isset($data['comment_type']) && $data['comment_type'] > 0 ){
                $tipo  = $data['comment_type'];
            }
            $comentariotxt = "";
            if(isset($data['comment_content'])){
                $comentariotxt  = $data['comment_content'];
            }
            $datos = [];
            $datos['comentario_usuario'] = $user;
            $datos['comentario_fecha'] = date("Y-m-d");
            $datos['comentario_hora'] = date("H:m:s");
            $datos['comentario_comentario'] = $comentariotxt;
            $datos['comentario_id_contenido'] = $idcontenido;
            $datos['comentario_tipo_contenido'] = $tipo;
            $comentario = Comentarios::create($datos);
            $micomentario = $this->comentarioformat($comentario);
            return response()->json(['message' => 'Comentario Creado', 'comentario'=> $micomentario], 200);
        } else {
            return response()->json(['message' => 'Hay una inconsistencia con el usuario'], 422);
        }
    }

    
    public function comentarioformat($comentario){
        $user = auth()->user()->user_id;
        $datos = [];
        $datos['postCommentId'] = (int)$comentario->comentario_id;
        $datos['postParentId'] = (int)$comentario->comentario_id_contenido;
        $datos['postCommentParentId']= 0 ;
        if(isset($comentario->user_names) && $comentario->user_names != '' ){
            $datos['postCommentUserId']= (int)$comentario->user_id;
            $datos['postCommentUserName']= $comentario->user_names." ".$comentario->user_lastnames ;
            if($comentario->user_foto != ''){
                $datos['postCommentUserAvatar'] = "http://api.togroow.com/images/".$comentario->user_foto;
            } else {
                $datos['postCommentUserAvatar'] = "http://api.togroow.com/skins/sistem/images/perfil.jpg";
            }
        } else {
            $usuario = Usuarios::find($user);
            $datos['postCommentUserId']= (int)$usuario->user_id;
            $datos['postCommentUserName']= $usuario->user_names." ".$usuario->user_lastnames ;
            if($usuario->user_foto != ''){
                $datos['postCommentUserAvatar'] = "http://api.togroow.com/images/".$usuario->user_foto;
            } else {
                $datos['postCommentUserAvatar'] = "http://api.togroow.com/skins/sistem/images/perfil.jpg";
            }
        }
        $datos['postCommentDate']=  $comentario->comentario_fecha." ".$comentario->comentario_hora;
        $datos['postCommentContent']=  $comentario->comentario_comentario ;
        $datos['postCommentLikes']= Likes::getCount($comentario->comentario_id,4) ;
        $datos['postCommentLikeUser']= Likes::getLikeMe($comentario->comentario_id,4,$user);
        $datos['postCommentReplies']= Comentarios::getCountComentarios($comentario->comentario_id,4);
        if($comentario->comentario_imagen != ''){
            $datos['postCommentImage'] = "http://api.togroow.com/images/".$comentario->comentario_imagen;
        } else {
            $datos['postCommentImage']= '';
        }
        return $datos;
    }

    

}
