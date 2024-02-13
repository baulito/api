<?php

namespace App\Models\Servicios\Togroow;


use Illuminate\Database\Eloquent\Model;

class Notificaciones extends Model
{
    protected $table = "notificacion";
    protected $fillable = ['source_user_id', 'dest_user_id', 'fecha', 'estado', 'tipo', 'contenido_id'];
    protected $guarded = ['id'];
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $casts = ['source_user_id' => 'integer', 'dest_user_id' => 'integer', 'tipo' => 'integer', 'estado' => 'integer', 'contenido_id' => 'integer' ];

    /*
        INVITE_FRIEND = 101, //invitar amigo
        INVITE_GROUP = 102, // invitar grupo
        INVITE_TEAM = 103, // invitar a equipo
        INVITE_CHALLENGE_PERSONAL = 104, / invitar a reto persona
        INVITE_CHALLENGE_TEAM = 105, // invitar a reto equipo
        RESPONSE_FRIENDSHIP = 201, // respouesta amigo
        RESPONSE_GROUP = 202, // respuesta grupo
        RESPONSE_TEAM = 203, // respouesta amigo
        RESPONSE_CHALLENGE_PERSONAL = 204 // respuesta invitacion reto persona,
        RESPONSE_CHALLENGE_TEAM = 205, // respuesta invitacion reto persona,
        POST_NEW = 300,
        POST_LIKE = 301, 
        POST_COMMENT = 302,
        POST_REPLY = 303,
        POST_TEAM_LIKE = 304,
        POST_TEAM_COMMENT = 305,
        POST_CHALLENGE = 306,
        POST_CHALLENGE_LIKE = 307,
        PRODUCT_LIKE = 401,
        PRODUCT_COMMENT = 402,
        PRODUCT_COMMENT_REPLY = 403,
        BLOG_LIKE = 501,
        BLOG_COMMENT = 502,
        BLOG_COMMENT_REPLY = 503,
        MATCH = 600,
        PLACE_LIKE = 701,
        PLACE_COMMENT = 702,
        PLACE_COMMENT_REPLY = 802,
        INITIATIVE_LIKE = 901,
        INITIATIVE_COMMENT = 902,
        INITIATIVE_COMMENT_REPLAY = 903,
        SPECIAL = 1500
    */

    public static function crearnotificacion($usuario1,$usuario2,$tipo,$contenido){
        $data = [];
        $data['source_user_id']= $usuario1;
        $data['dest_user_id']= $usuario2;
        $data['fecha']= date("Y-m-d");
        $data['estado'] = 0;
        $data['tipo'] = $tipo;
        $data['contenido_id'] = $contenido;
        self::create($data);
    }
}
