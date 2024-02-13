<?php

namespace App\Models\Servicios;

use Illuminate\Database\Eloquent\Model;

class Tipoelementos extends Model
{
    protected $table = "elemento_tipo";
    protected $fillable = ['nombre', 'tipo', 'red'];
    protected $guarded = ['id'];
    protected $primaryKey = 'id';
    public $timestamps = true;
}
