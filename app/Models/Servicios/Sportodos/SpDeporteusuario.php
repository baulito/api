<?php

namespace App\Models\Servicios\Sportodos;


use Illuminate\Database\Eloquent\Model;
use App\Models\Servicios\Sportodos\SpPosicion;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SpDeporteusuario extends Model
{
    protected $table = "sp_deporte";
    protected $fillable = ['user_id', 'deporte_id', 'posicion_id', 'nivel_id'];
    protected $guarded = ['id'];
    protected $primaryKey = 'id';
    public $timestamps = true;
}
