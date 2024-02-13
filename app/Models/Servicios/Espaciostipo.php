<?php

namespace App\Models\Servicios;

use Illuminate\Database\Eloquent\Model;

class Espaciostipo extends Model
{
    protected $table = "espacios_tipo";
    protected $fillable = ['nombre','icono'];
    protected $guarded = ['id'];
    protected $primaryKey = 'id';
    public $timestamps = true;
}
