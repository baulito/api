<?php

namespace App\Models\Servicios;

use Illuminate\Database\Eloquent\Model;

class Espaciosasignacionservicios extends Model
{
    protected $table = "espacios_asignacion_servicios";
    protected $fillable = ['servicio','espacio'];
    public $timestamps = false;
}
