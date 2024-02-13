<?php

namespace App\Models\Servicios\Sportodos;


use Illuminate\Database\Eloquent\Model;

class SpEquipousuario extends Model
{
    protected $table = "sp_equipo_usuario";
    protected $fillable = ['equipo_id','user_id','status','rol','acept_user_id'];
    protected $guarded = ['id'];
    protected $primaryKey = 'id';
    public $timestamps = true;
}
