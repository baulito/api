<?php

namespace App\Models\Servicios\Togroow;

use App\Models\Servicios\Togroow\Pais;
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $table = "ciudades";
    protected $fillable = ['pais_id','pais','ciudad'];
    protected $guarded = ['id'];
    protected $primaryKey = 'id';

    public function pais()
    {
        return $this->belongsTo(Pais::class, 'pais_id', 'pais_codigo');
    }
}