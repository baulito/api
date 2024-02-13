<?php

namespace App\Models\Servicios\Sportodos;

use Illuminate\Database\Eloquent\Model;

class SpBarrerausuario extends Model
{
    protected $table = "sp_barrera_usuario";
    protected $fillable = ['user_id','barrera_id'];
    protected $guarded = ['id'];
    protected $primaryKey = 'id';
    public $timestamps = true;

}
