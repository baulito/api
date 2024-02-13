<?php

namespace App\Models\Servicios\Sportodos;

use App\Models\Servicios\Togroow\Pais;

use App\Models\Servicios\Togroow\Ciudad;
use Illuminate\Database\Eloquent\Model;

class SpCiudad extends Model
{

    protected $table = "sp_ciudad";
    protected $fillable = ['pais_id','ciudad_id', 'latitud', 'longitud'];
    protected $guarded = ['id'];
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function ciudad()
    {
        return $this->hasOne(Ciudad::class, 'id', 'ciudad_id');
    }

    public function pais()
    {
        return $this->hasOneThrough(Pais::class, Ciudad::class, 'id', 'pais_codigo', 'ciudad_id', 'pais_id');
        // relacionado con, por medio de, llave en Ciudad, Llave en Pais, LLave en SpCiudad, Llave en Ciudad
    }
}