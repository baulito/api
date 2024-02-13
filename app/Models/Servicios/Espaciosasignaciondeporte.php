<?php

namespace App\Models\Servicios;

use Illuminate\Database\Eloquent\Model;

class Espaciosasignaciondeporte extends Model
{
    protected $table = "espacios_asignacion_deporte";
    protected $fillable = ['deporte','espacio'];
    public $timestamps = false;
}
