<?php

namespace App\Models\Servicios\Togroow;
use Illuminate\Database\Eloquent\Model;

class Categoriasproductos extends Model
{
    protected $table = "store_categoria";
    protected $fillable = ['store_categoria_titulo', 'store_categoria_imagen', 'store_categoria_descripcion', 'store_categoria_padre', 'store_categoria_tipo', 'store_categoria_idcontenido', 'store_categoria_icono', 'store_categoria_google', 'orden'];
    protected $primaryKey = 'store_categoria_id';

  
}