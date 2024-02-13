<?php

namespace App\Models\Servicios\Sportodos;


use Illuminate\Database\Eloquent\Model;
use App\Models\Servicios\Sportodos\SpDeporte;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SpImagenes extends Model
{
    protected $table = "sp_imagenes";
    protected $fillable = ['ruta','contenido_id','contenido_type'];
    protected $guarded = ['id'];
    protected $primaryKey = 'id';
    public $timestamps = true;
    
    public function contenido(){
        return $this->morphTo();
    }

}
