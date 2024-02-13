<?php

namespace App\Models\Servicios;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    protected $table = "user";
    protected $fillable = ['user_names', 'user_lastnames', 'user_email', 'user_idnumber', 'user_city', 'user_country', 'user_phone', 'user_address', 'user_level', 'user_state', 'user_user', 'user_password', 'user_delete', 'user_current_user', 'user_code', 'user_informacion', 'user_foto', 'user_fondo', 'user_paso1', 'user_paso2', 'user_paso3', 'user_landing', 'user_postal', 'user_educacion', 'user_institucion', 'user_mayor', 'user_estudiante', 'user_negocio', 'user_popup', 'user_fecha_creacion', 'user_fecha_modificacion','user_typepople','user_typeid'];
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
                $usuario['nombre'] = $resUser->user_names." ".$resUser->user_lastnames;
                $usuario['correo'] = $resUser->user_email;
                $usuario['nivel'] = $resUser->user_level;
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
}
