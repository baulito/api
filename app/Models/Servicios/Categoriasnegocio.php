<?php

namespace App\Models\Servicios;

use Illuminate\Database\Eloquent\Model;

class Categoriasnegocio extends Model
{
    protected $table = "categoria";
    protected $fillable = ['categoria_nombre', 'categoria_tipo', 'categorias_descripcion', 'categoria_productos', 'categoria_servicios', 'categoria_necesidades', 'categoria_clasificados', 'categoria_sitio', 'categoria_titulo1', 'categoria_nombre2', 'categoria_imagen', 'categoria_video', 'categoria_introduccion', 'categoria_descripcion', 'categoria_introduccion_sector', 'categoria_pais', 'categoria_otrospaises', 'categoria_ciudad', 'categoria_pagina', 'categoria_tags', 'categoria_titulo2', 'categoria_direccion', 'categoria_nombres', 'categoria_correo', 'categoria_telefono', 'categoria_cargo', 'categoria_otrainfo', 'categoria_celular', 'categoria_horario', 'categoria_titulo3', 'orden'];
    protected $guarded = ['categoria_id'];
    protected $primaryKey = 'categoria_id';
    public $timestamps = false;
}
