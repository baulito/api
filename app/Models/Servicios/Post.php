<?php

namespace App\Models\Servicios;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = "post";
    protected $fillable = ['post_user', 'post_descripcion', 'post_imagen', 'post_video', 'post_fecha', 'post_hora', 'post_tipo', 'post_contenido', 'post_redsocial', 'post_url', 'post_url_imagen', 'post_url_titulo', 'post_url_descripcion', 'post_compartido_id', 'post_compartido_tipo'];
    protected $guarded = ['post_id'];
    protected $primaryKey = 'post_id';
    public $timestamps = false;
}
