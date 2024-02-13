<?php

namespace App\Models\Servicios\Togroow;


use Illuminate\Database\Eloquent\Model;
use App\Models\Servicios\Togroow\Ciudad;

class Pais extends Model
{
    protected $table = "pais";
    protected $fillable = ['pais_codigo', 'pais_nombre'];
    protected $casts = ['pais_codigo' => 'string'];
    //    protected $guarded = ['pais_codigo'];
    protected $primaryKey = 'pais_codigo';

    public function ciudades()
    {
        return $this->hasMany(Ciudad::class, 'pais_id', 'pais_codigo');
    }
}