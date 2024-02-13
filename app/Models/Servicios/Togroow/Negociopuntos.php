<?php
namespace App\Models\Servicios\Togroow;
use Illuminate\Database\Eloquent\Model;


class Negociopuntos extends Model
{
    protected $table = "negocio_mipaquete_direccion";
    protected $fillable = ['negocio','nombre','pais','ciudad','direccion','adicional','telefono1','telefono2'];
    protected $primaryKey = 'id';
}