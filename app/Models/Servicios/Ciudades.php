<?php

namespace App\Models\Servicios;

use Illuminate\Database\Eloquent\Model;

class Ciudades extends Model
{
    protected $table = "ciudades";
    protected $fillable = ['pais', 'ciudad'];
    protected $guarded = ['id'];
    protected $primaryKey = 'id';
    public $timestamps = true;
}
