<?php

namespace App\Models\Servicios\Sportodos;


use Illuminate\Database\Eloquent\Model;
use App\Models\Servicios\Sportodos\SpPosicion;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SpDeporte extends Model
{
    protected $table = "sp_deporte";
    protected $fillable = ['nombre','icono','tipo','minimo','maximo'];
    protected $guarded = ['id'];
    protected $primaryKey = 'id';
    protected $casts = [ 'maximo' => 'integer', 'minimo' => 'integer', 'tipo' => 'integer'];
    public $timestamps = true;

    public function posiciones() {
        return $this->hasMany(SpPosicion::class,'deporte_id', 'id');
    }

    public function usuarios() {
        return $this->belongsToMany(SpUsuario::class, 'sp_deportes_usuario', 'deporte_id', 'user_id');
    }
}
