<?php

namespace App\Models\Servicios;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $table = "pais";
    protected $fillable = ['pais_codigo', 'pais_nombre'];
    public $timestamps = true;
}
