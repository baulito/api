<?php

namespace App\Models\Servicios;

use Illuminate\Database\Eloquent\Model;

class Deportes extends Model
{
    protected $table = "deportes";
    protected $fillable = ['nombre'];
    protected $guarded = ['id'];
    protected $primaryKey = 'id';
    public $timestamps = true;
}
