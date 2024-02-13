<?php

namespace App\Models\Servicios;

use Illuminate\Database\Eloquent\Model;

class Elementos extends Model
{
    protected $table = "elemento";
    protected $fillable = ['estado', 'nombre', 'creditos', 'cantidad', 'alquiler', 'clase', 'asignacion', 'persona', 'red','imagen','descripcion','tv','videobean','teleconferencia'];
    protected $guarded = ['id'];
    protected $primaryKey = 'id';
    public $timestamps = false;
}
