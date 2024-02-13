<?php

namespace App\Models\Servicios\Togroow;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class  Usuarios extends Model
{
    protected $table = "user";
    protected $fillable = [
        'user_names', 'user_lastnames',
        'user_email', 'user_idnumber',
        'user_city', 'user_country',
        'user_phone', 'user_address',
        'user_level', 'user_state',
        'user_user', 'user_password',
        'user_delete', 'user_current_user',
        'user_code', 'user_informacion',
        'user_foto', 'user_fondo',
        'user_paso1', 'user_paso2',
        'user_paso3', 'user_landing',
        'user_postal', 'user_educacion',
        'user_institucion', 'user_mayor',
        'user_estudiante', 'user_negocio',
        'user_popup', 'user_fecha_creacion',
        'user_fecha_modificacion','user_typepople',
        'user_typeid', 'user_remember_token'
    ];
    protected $primaryKey = 'user_id';
    protected $guarded = ['user_id'];
    public $timestamps = false;


    public static function autenticateUser($user,$password){
        $data = [];
        $resUser = Usuarios::orWhere("user_user",$user)->orWhere("user_email",$user)->first();
        if( isset($resUser) && $resUser->user_id) {
            if(password_verify($password,$resUser->user_password)){
                $usuario = [];
                $usuario['id'] = $resUser->user_id;
                $usuario['nombre'] = $resUser->user_names;
                $usuario['apellidos'] = $resUser->user_lastnames;
                $usuario['correo'] = $resUser->user_email;
                $usuario['nivel'] = $resUser->user_level;
                $usuario['avatar'] = $resUser->user_foto;
                $usuario['estado'] = $resUser->user_state;
                $usuario['fondo'] = $resUser->user_fondo;
                $usuario['ultima_actividad'] = Date::now();
                $data['estado'] = true;
                $data['usuario'] = $usuario;
            }else{
                $data['estado'] = false;
            }
        } else {
            $data['estado'] = false;
        }
        return $data;
    }

    public static function buscar($filtros,$user){
        $ruta = "https://api.sportodos.com/images/";
            $where = '';
        if(isset($filtros['buscar'])){
            $cadena = $filtros['buscar'];
            if(str_word_count($cadena, 0) > 1){
                $where = "AND MATCH (user_names, user_lastnames, user_email ) AGAINST ('$cadena' IN BOOLEAN MODE)";
            } else {
                $where = "AND (user_names LIKE '%$cadena%' OR  user_lastnames LIKE '%$cadena%' OR user_email LIKE '%$cadena%' )";
            }
        }
        $results =  DB::select("select user.user_id, user.user_names,user.user_lastnames,amigo_estado, sp_usuario.deporte_id,sp_usuario.posicion_id, user.user_city,user.user_state, user_foto, user_informacion,user_email, amigo_usuario_2 , amigo_usuario_1, user.user_fondo  from (user LEFT JOIN amigo ON ( (amigo_usuario_2 = '$user' AND amigo_usuario_1 = user_id) OR (amigo_usuario_2 = user_id  AND amigo_usuario_1 = '$user'))) LEFT JOIN sp_usuario ON sp_usuario.user_id = user.user_id WHERE 1 = 1 $where ");
        return $results;
    }

    public  static function getResumenUsuario($user,$amigo){
        $results =  DB::select("select user.user_id, user.user_names,user.user_lastnames,amigo_estado, sp_usuario.deporte_id, user.user_city,user.user_state, user_foto, user_informacion,user_email, amigo_usuario_2 , amigo_usuario_1, user.user_fondo  from (user LEFT JOIN amigo ON ( (amigo_usuario_2 = '$user' AND amigo_usuario_1 = user_id) OR (amigo_usuario_2 = user_id  AND amigo_usuario_1 = '$user'))) LEFT JOIN sp_usuario ON sp_usuario.user_id = user.user_id WHERE user.user_id = '$amigo'  ");
        if(isset($results[0])){
            $usuario = $results[0];
            $data = [];
            $data['user_id'] = (int)$usuario->user_id;
            $data['user_names'] = html_entity_decode($usuario->user_names);
            $data['user_lastnames'] = html_entity_decode($usuario->user_lastnames);
            $data['user_informacion'] = html_entity_decode($usuario->user_informacion);
            $data['user_email'] = $usuario->user_email;
            $data['user_city'] = html_entity_decode($usuario->user_city);
            if($usuario->user_foto != ''){
                $data['avatar'] = "https://api.sportodos.com/images/".$usuario->user_foto;
            } else {
                $data['avatar'] = "https://api.sportodos.com/skins/sistem/images/perfil.jpg";
            }
            if($usuario->user_fondo != ''){
                $data['user_fondo'] = "https://api.sportodos.com/images/".$usuario->user_fondo;
            }  else {
                $data['user_fondo'] = null;
            }
            if($usuario->amigo_usuario_1 && $usuario->amigo_usuario_2 ){
                if($usuario->amigo_estado == 1){
                    $data['amigo_estado'] = "1";   
                } else {
                    if($usuario->amigo_usuario_1 == $user ){
                        $data['amigo_estado'] = "2";
                    } else {
                        $data['amigo_estado'] = "3";
                    }
                }
            } else {
                $data['amigo_estado'] = "0";
            }
            $data['deporte_id'] = (int)$usuario->deporte_id; 
            return $data;
        } else {
            return null;
        }
    }

    public static function formatsimple($id){
        $usuario = self::find($id);
        if(isset($usuario->user_id)){
            $user = [];
            $user['userId'] = (int)$usuario->user_id;
            $user['name'] = html_entity_decode($usuario->user_names." ".$usuario->user_lastnames);
            if($usuario->user_foto != ''){
                    $user['avatar'] = "https://api.sportodos.com/images/".$usuario->user_foto;
            } else {
                    $user['avatar'] = "https://api.sportodos.com/skins/sistem/images/perfil.jpg";
            }
            return $user;
        } else { 
            return [];
        }
    }

    
}
