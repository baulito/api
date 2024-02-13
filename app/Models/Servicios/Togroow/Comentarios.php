<?php

namespace App\Models\Servicios\Togroow;


use Illuminate\Database\Eloquent\Model;

class Comentarios extends Model
{
    protected $table = "comentario";
    protected $fillable = ['comentario_usuario', 'comentario_comentario', 'comentario_imagen', 'comentario_id_contenido', 'comentario_tipo_contenido', 'comentario_fecha', 'comentario_hora'];
    protected $guarded = ['comentario_id'];
    protected $primaryKey = 'comentario_id';

    public $timestamps = false;


    public static function getCountComentarios($contenido,$tipo){
        $results = self::where('comentario_id_contenido',$contenido)->where('comentario_tipo_contenido',$tipo)->orderBy('comentario_id','DESC')->get();
        return count($results);
    }

    public static function getComentarios($contenido,$tipo){
        $results = self::where('comentario_id_contenido',$contenido)->where('comentario_tipo_contenido',$tipo)->leftJoin('user', 'user.user_id', '=', 'comentario.comentario_usuario')->get();
        return $results;
    }
}
