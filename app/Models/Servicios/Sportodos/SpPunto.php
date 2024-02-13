<?php

namespace App\Models\Servicios\Sportodos;


use Illuminate\Database\Eloquent\Model;

class SpPunto extends Model
{
    protected $table = "sp_punto";
    protected $fillable = ['nombre', 'contacto', 'telefono', 'correo', 'direccion', 'pais_id', 'ciudad_id', 'zona_id', 'latitud', 'longitud', 'descripcion', 'redsocial_id','foto','portada'];
    protected $guarded = ['id'];
    protected $primaryKey = 'id';
    protected $casts = [ 'ciudad_id' => 'integer', 'zona_id' => 'integer'];
    public $timestamps = true;

    public function deportes()
    {
        return $this->belongsToMany(SpDeporte::class, 'sp_deporte_punto', 'punto_id', 'deporte_id');
    }
    public function servicios()
    {
        return $this->belongsToMany(SpServicio::class, 'sp_servicio_punto', 'punto_id', 'servicio_id');
    }
    
    public function espacios()
    {
        return $this->hasMany(SpEspacio::class, 'punto_id', 'id');
    }

    public function fotos()
    {
        return $this->morphMany(SpImagenes::class,'contenido');
    }
}