<?php

namespace App\Models\Servicios;

use Illuminate\Database\Eloquent\Model;

class Espacios extends Model
{
    protected $table = "espacios";
    protected $fillable = ['nombre', 'contacto', 'telefono', 'correo', 'direccion', 'pais', 'ciudad', 'zona', 'latitud', 'longitud', 'descripcion', 'redsocial', 'foto'];
    protected $guarded = ['id'];
    protected $primaryKey = 'id';
    public $timestamps = true;
}
