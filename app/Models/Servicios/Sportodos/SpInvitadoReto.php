<?php

namespace App\Models\Servicios\Sportodos;


use Illuminate\Database\Eloquent\Model;

class SpInvitadoReto extends Model
{
    protected $table = "sp_invitados_reto";
    protected $fillable = ['usuario_id', 'correo', 'invitador', 'estado', 'tipo'];
    protected $guarded = ['id'];
    protected $primaryKey = 'id';
    public $timestamps = true;
}
