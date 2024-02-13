<?php

namespace App\Models\Servicios\Sportodos;


use Illuminate\Database\Eloquent\Model;

class SpZona extends Model
{

    protected $table = "sp_zona";
    protected $fillable = ['pais_id','ciudad_id', 'nombre', 'latitud', 'longitud'];
    protected $guarded = ['id'];
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function ciudad()
    {
        return $this->belongsTo(SpCiudad::class, 'ciudad_id', 'id');
    }
}