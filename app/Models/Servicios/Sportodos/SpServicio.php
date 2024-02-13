<?php

namespace App\Models\Servicios\Sportodos;


use Illuminate\Database\Eloquent\Model;

class SpServicio extends Model
{
    protected $table = "sp_servicio";
    protected $fillable = ['nombre','icono'];
    protected $guarded = ['id'];
    protected $primaryKey = 'id';
    public $timestamps = true;
}
