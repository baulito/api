<?php

namespace App\Models\Servicios\Togroow;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Useraddress extends Model
{
    protected $table = "userenvios";
    protected $fillable = ['usuario', 'nombre', 'documento', 'telefono', 'pais', 'ciudad', 'barrio', 'direccion', 'adicional', 'principal','ciudadnombre'];
    protected $primaryKey = 'id';
    public $timestamps = true;
    
}