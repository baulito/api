<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicios\Togroow\Post;
use App\Models\Servicios\Togroow\Comentarios;
use App\Models\Servicios\Togroow\Usuarios;
use App\Models\Servicios\Togroow\Likes;
use Illuminate\Support\Facades\Auth;
use App\Traits\UploadTrait;

/**
 * @group  Gestion de Posts
 * clase para listar, crear ,editar  y eliminar un post
 */
class PostController extends Controller
{
    /**
     * Funcion para listar los post cargados dentro del sistema
     *
     * @return void
     */
    public function index(){
        $json = Post::where("post_tipo",0)->orderBy("post_fecha","DESC")->orderBy("post_hora","DESC")->paginate(10);
        $list = $this->getFormatPost($json);
        return response()->json($list);
     }

    /**
    * Funcion para listar los post cargados dentro del sistema para una red oscial en especifico 
    *
    * @param [type] $red identificador de la red social a mostrar
    * @urlParam red  identificador de la red social a mostrar
    * @return void
    */
     public function red($red){
        $json = Post::where("post_tipo",0)->where("post_redsocial",$red)->orderBy("post_fecha","DESC")->orderBy("post_hora","DESC")->paginate(10);
        $list = $this->getFormatPost($json);
        return response()->json($list);
     }

    /**
     * Funcion para listar los post cargados dentro del sistema
     *
     * @return void
     */
    public function listarPosts($from, $bufferSize, $lastReceived= null, $update = false) {
        $json = Post::get();
        return response()->json($json);
    }

    /**
     * Funcion para ver un post en especifico 
     *
     * @param [type] $id identificador del post que se decea ver
     * @urlParam id identificador del post que se decea ver
     * @return void
     */
    public function detalle($id){
        $post = Post::find($id);
        $json =  $this->getPostformat($post);
        return response()->json($json);
    }

    /**
     * Funcion para crear un post
     * @param Request $request
     * @return void
     */
    public function crear(Request $request) {
        $data = $request->all();
        $user = auth()->user()->user_id;
        if(isset($data['post_usuario']) && isset($data['post_usuario']['user_id'])  && $user == $data['post_usuario']['user_id']){
            $data['post_user'] = $user;
            $data['post_fecha'] = date("Y-m-d");
            $data['post_hora'] = date("H:i:s");
            if ($request->hasFile('post_imagen')) {
                $image = $request->file('post_imagen');
                $imagen = UploadTrait::uploadImageOne($image);
            }
            $post = Post::create($data);
            $mipost = $this->getPostformat($post);
            return response()->json(['message' => 'Post Creado', 'post'=> $mipost], 200);
        } else {
            return response()->json(['message' => 'Hay una inconsistencia con el usuario'], 422);
        }

    }

    /**
     * Funcion para actualizar un post
     * @param Request $request
     * @return void
     */
    public function update(Request $request) {
        $data = $request->all();
        $user = auth()->user()->user_id;
        if(isset($data['post_usuario']) && isset($data['post_usuario']['user_id'])  && $user == $data['post_usuario']['user_id']){
            $data['post_user'] = $user;
            $data['post_fecha'] = date("Y-m-d");
            $data['post_hora'] = date("H:i:s");
            if ($request->hasFile('post_imagen')) {
                $image = $request->file('post_imagen');
                $imagen = UploadTrait::uploadImageOne($image);
            }
            $post = Post::create($data);
            $mipost = $this->getPostformat($post);
            return response()->json(['message' => 'Post Creado', 'post'=> $mipost], 200);
        } else {
            return response()->json(['message' => 'Hay una inconsistencia con el usuario'], 422);
        }

    }

    /**
     * Funcion para dar formato a un listado de post en especifico
     *
     * @param [type] $listpost
     * @return void
     */
    public function getFormatPost($listpost){
        foreach($listpost as $key => $post) {
            $usuario = Usuarios::where("user_id",$post->post_user)->first();
            if(isset($usuario)){
            //print_r($usuario->user_id);
                $usuariodata = [];
                $usuariodata['user_id'] = (int) $usuario->user_id;
                $usuariodata['nombre'] = html_entity_decode($usuario->user_names." ".$usuario->user_lastnames);
                if($usuario->user_foto != ''){
                    $usuariodata['foto'] = "http://api.togroow.com/images/".$usuario->user_foto;
                } else {
                    $usuariodata['foto'] = "http://api.togroow.com/skins/sistem/images/perfil.jpg";
                }
              $listpost[$key]->post_usuario = $usuariodata;
            } else {
                $usuariodata = [];
                $usuariodata['user_id'] = (int) 0;
                $usuariodata['nombre'] = "Anónimo";
                $usuariodata['foto'] = "http://api.togroow.com/skins/sistem/images/perfil.jpg";
                $listpost[$key]->post_usuario = $usuariodata;
            }
            $listpost[$key]->post_fechahora = $post->post_fecha." ".$post->post_hora;
            $listpost[$key]->post_like = Likes::getCount($post->post_id,2);
            $listpost[$key]->post_comentario = Comentarios::getCountComentarios($post->post_id,2);
            $listpost[$key]->post_compartir = Post::getCountCompartidos($post->post_id);
            $user = auth()->user()->user_id;
            $listpost[$key]->post_like_user = Likes::getLikeMe($post->post_id,2,$user);
            if( $post->post_compartido_id > 0 && $post->post_compartido_tipo == 0 ){
                $postcompartido = Post::where("post_id",$post->post_compartido_id)->first();
                $listpost[$key]->post_compartido = $this->getPostformat($postcompartido);
            } else {
                $listpost[$key]->post_compartido = null;
            }

            if(isset($listpost[$key]->post_imagen)){
                $listpost[$key]->post_imagen = "http://api.togroow.com/images/".$listpost[$key]->post_imagen;
            }
        }
        return $listpost;
    }
    /**
     * Funcion para dar formato a un  post en especifico
     *
     * @param [type] $listpost
     * @return void
     */
    public function  getPostformat($post){
        $usuario = Usuarios::where("user_id",$post->post_user)->first();
        if(isset($usuario)){
            //print_r($usuario->user_id);
            $usuariodata = [];
            $usuariodata['user_id'] = (int) $usuario->user_id;
            $usuariodata['nombre'] = html_entity_decode($usuario->user_names." ".$usuario->user_lastnames);
            if($usuario->user_foto != ''){
                $usuariodata['foto'] = "http://api.togroow.com/images/".$usuario->user_foto;
            } else {
                $usuariodata['foto'] = "http://api.togroow.com/skins/sistem/images/perfil.jpg";
            }
            $post->post_usuario = $usuariodata;
        } else {
            $usuariodata = [];
            $usuariodata['user_id'] = (int) 0;
            $usuariodata['nombre'] = "Anónimo";
            $usuariodata['foto'] = "http://api.togroow.com/skins/sistem/images/perfil.jpg";
            $post->post_usuario = $usuariodata;
        }
        $post->post_fechahora = $post->post_fecha." ".$post->post_hora;
        $post->post_like = Likes::getCount($post->post_id,2);
        $post->post_comentario = Comentarios::getCountComentarios($post->post_id,2);
        $post->post_compartir = Post::getCountCompartidos($post->post_id);
        if( $post->post_compartido_id > 0 && $post->post_compartido_tipo == 0 ){
            $postcompartido = Post::where("post_id",$post->post_compartido_id)->first();
            $post->post_compartido = $this->getPostformat($postcompartido);
        } else {
            $post->post_compartido = null;
        }
        if(isset($post->post_imagen)){
            $post->post_imagen = "http://api.togroow.com/images/".$post->post_imagen;
        }
        return $post;

    }

    /**
     * funcion de prueba para carga de imagenes
     *
     * @return void
     */
    public function formimage(){
        return view('formimagen');
    }
    /**
     * funcion de prueba paraguardar una imagen
     *
     * @return void
     */
    public function saveimage(Request $request){
        if ($request->hasFile('post_imagen')) {
            $image = $request->file('post_imagen');
            $imagen = UploadTrait::uploadImageOne($image);
            echo $imagen;
        } else {
            echo "no envio la imagen";
        }
    }

}
