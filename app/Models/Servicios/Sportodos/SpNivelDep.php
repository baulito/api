<?php

namespace App\Models\Servicios\Sportodos;

use Illuminate\Database\Eloquent\Model;

class SpNivelDep extends Model
{
    protected $table = "sp_nivel_deportivo";
    protected $fillable = ['nivel'];
    protected $guarded = ['id'];
    protected $primaryKey = 'id';
    public $timestamps = true;
}
