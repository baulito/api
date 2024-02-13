<?php

namespace App\Models\Servicios;

use Illuminate\Database\Eloquent\Model;

class Deporteposicion extends Model
{
    protected $table = "deporte_posicion";
    protected $fillable = ['nombre','deporte'];
    protected $guarded = ['id'];
    protected $primaryKey = 'id';
    public $timestamps = true;
}
