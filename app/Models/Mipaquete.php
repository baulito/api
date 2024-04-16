<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mipaquete extends Model
{
    protected $table = "mipaquete";
    protected $fillable = ['correo', 'apikey'];
    protected $guarded = ['id'];
    public $timestamps = true;
}
