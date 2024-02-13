<?php

namespace App\Models\Servicios\Togroow;
use Illuminate\Database\Eloquent\Model;

class Productoscaracteristica extends Model
{
    protected $table = "store_caracteristicas";
    protected $fillable = ['negocio', 'nombre', 'orden','tipo'];
    protected $primaryKey = 'id';

}