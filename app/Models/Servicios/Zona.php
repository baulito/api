<?php

namespace App\Models\Servicios;

use Illuminate\Database\Eloquent\Model;

class Zona extends Model
{
    protected $table = "zona";
    protected $fillable = ['ciudad', 'nombre'];
    protected $guarded = ['id'];
    protected $primaryKey = 'id';
    public $timestamps = true;
}
