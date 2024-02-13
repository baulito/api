<?php

namespace App\Models\Servicios\Sportodos;


use Illuminate\Database\Eloquent\Model;

class SpTipoEspacio extends Model
{
    protected $table = "sp_tipo_espacios";
    protected $fillable = ['nombre','icono'];
    protected $guarded = ['id'];
    protected $primaryKey = 'id';
    public $timestamps = true;
}
