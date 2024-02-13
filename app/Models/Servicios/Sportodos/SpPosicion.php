<?php

namespace App\Models\Servicios\Sportodos;


use Illuminate\Database\Eloquent\Model;
use App\Models\Servicios\Sportodos\SpDeporte;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SpPosicion extends Model
{
    protected $table = "sp_deporte_posicion";
    protected $fillable = ['nombre','deporte_id'];
    protected $guarded = ['id'];
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function deporte() {
        return $this->belongsTo(SpDeporte::class, 'deporte_id', 'id');
    }
}
