<?php
namespace App\Models\Servicios\Togroow;
use Illuminate\Database\Eloquent\Model;


class Mipaquete extends Model
{
    protected $table = "negocio_mipaquete";
    protected $fillable = ['negocio', 'usuario', 'correo', 'apikey', 'pais', 'ciudad', 'direccion', 'adicional', 'telefono1', 'telefono2', 'correo1', 'correo2'];
    protected $primaryKey = 'id';
}