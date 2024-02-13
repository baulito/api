<?php

namespace App\Models\Servicios\Togroow;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Amigos extends Model
{
    protected $table = "amigo";
    protected $fillable = ['amigo_usuario_1','amigo_usuario_2','amigo_fecha_solicitud','amigo_estado','amigo_fecha_registro'];
    protected $casts = ['amigo_estado' => 'integer'];
    //    protected $guarded = ['pais_codigo'];
    protected $primaryKey = 'amigo_id';
    public $timestamps = false;


    
    public static function getamigos($user,$status){
        if($status == 1){

        }
        $jquery = "select user.user_id, user.user_names,user.user_lastnames,amigo_estado, sp_usuario.deporte_id,sp_usuario.posicion_id, user.user_city,user.user_state, user_foto, user_informacion,user_email, amigo_usuario_2 , amigo_usuario_1, user.user_fondo   from (user INNER JOIN amigo ON ( (amigo_usuario_2 = '$user' AND amigo_usuario_1 = user_id) OR (amigo_usuario_2 = user_id  AND amigo_usuario_1 = '$user'))) LEFT JOIN sp_usuario ON sp_usuario.user_id = user.user_id ";
        $results =  DB::select($jquery);
        return $results;
    }
}