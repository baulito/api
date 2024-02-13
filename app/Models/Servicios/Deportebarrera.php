<?php

namespace App\Models\Servicios;

use Illuminate\Database\Eloquent\Model;

class Deportebarrera extends Model
{
    protected $table = "deporte_barreras";
    protected $fillable = ['nombre','tipo'];
    protected $guarded = ['id'];
    protected $primaryKey = 'id';
    public $timestamps = true;
}
