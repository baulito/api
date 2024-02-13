<?php
namespace App\Models\Servicios\Togroow;
use Illuminate\Database\Eloquent\Model;


class Mipaqueteciudades extends Model
{
    protected $table = "mipaquete_ciudades";
    protected $fillable = ['ciudad', 'pais','departamento'];
    protected $primaryKey = 'id';
    public $incrementing = false;
}