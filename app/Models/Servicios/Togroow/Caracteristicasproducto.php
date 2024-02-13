<?php

namespace App\Models\Servicios\Togroow;
use Illuminate\Database\Eloquent\Model;

class Caracteristicasproducto extends Model
{
    protected $table = "store_producto_cantidades";
    protected $fillable = ['ids_opciones', 'cantidades'];
    protected $primaryKey = 'idproducto';

  
}