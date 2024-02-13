<?php

namespace App\Models\Servicios;

use Illuminate\Database\Eloquent\Model;

class Elementoreserva extends Model
{
    protected $table = "elemento_reserva";
    protected $fillable = ['elemento', 'usuario', 'fecha', 'horainicio', 'horafin'];
    protected $guarded = ['id'];
    protected $primaryKey = 'id';
    public $timestamps = true;
}
