<?php

namespace App\Models\Servicios\Togroow;
use Illuminate\Database\Eloquent\Model;


class Productoscantidades extends Model
{
    protected $table = "store_producto_cantidades";
    protected $fillable = ['idproducto','ids_opciones', 'cantidades'];
    public $timestamps = false;
    protected $primary_key = null;
}