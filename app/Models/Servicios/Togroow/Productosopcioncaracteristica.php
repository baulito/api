<?php

namespace App\Models\Servicios\Togroow;
use Illuminate\Database\Eloquent\Model;
use App\Models\Servicios\Togroow\Productoscaracteristica;


class Productosopcioncaracteristica extends Model
{
    protected $table = "store_caracteristicas_opciones";
    protected $fillable = ['caracteristica', 'nombre', 'orden'];
    protected $primaryKey = 'id';

    public function infocaracteristica(){
        return Productoscaracteristica::find($this->caracteristica);
    }

}