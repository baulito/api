<?php

namespace App\Models\Servicios;

use Illuminate\Database\Eloquent\Model;

class Espaciosservicios extends Model
{
    protected $table = "espacios_servicios";
    protected $fillable = ['nombre','icono'];
    protected $guarded = ['id'];
    protected $primaryKey = 'id';
    public $timestamps = true;
}
