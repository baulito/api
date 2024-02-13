<?php

namespace App\Models\Servicios;

use Illuminate\Database\Eloquent\Model;

class Negocios extends Model
{
    protected $table = "registro";
    protected $fillable = ['registro_nombre', 'registro_imagen', 'registro_fondo', 'registro_video', 'registro_introduccion', 'registro_descripcion', 'registro_categoria', 'registro_sitio', 'registro_tags', 'registro_pais', 'registro_otropais', 'registro_ciudad', 'registro_sector', 'registro_pagina', 'registro_direccion', 'registro_fecha', 'registro_contacto_georeferenciacion', 'registro_contacto_nombre', 'registro_contacto_correo', 'registro_contacto_telefono', 'registro_contacto_cargo', 'registro_contacto_datos', 'registro_contacto_celular', 'registro_contacto_horario', 'registro_usuario', 'registro_fecha_edicion', 'registro_eliminado', 'registro_identificador'];
    protected $guarded = ['registro_id'];
    protected $primaryKey = 'registro_id';
    public $timestamps = false;
}
