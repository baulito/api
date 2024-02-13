<?php

namespace App\Models\Servicios\Sportodos;


use Illuminate\Database\Eloquent\Model;

class SpEspacio extends Model
{
    protected $table = "sp_espacio";
    protected $fillable = ['nombre','descripcion','latitud','longitud','punto_id','foto'];
    protected $guarded = ['id'];
    protected $primaryKey = 'id';
    protected $casts = ['punto_id' => 'integer' ];
    public $timestamps = true;

    public function deportes()
    {
        return $this->belongsToMany(SpDeporte::class, 'sp_deporte_espacio', 'espacio_id', 'deporte_id');
    }

    public function fotos()
    {
        return $this->morphMany(SpImagenes::class,'contenido');
    }

    public static function espacioformat($id_espacio){
        $espacios = self::select('sp_espacio.*','sp_punto.nombre AS nombre_punto','sp_punto.telefono','sp_punto.direccion')->join('sp_punto', 'sp_punto.id', '=', 'sp_espacio.punto_id')->where("sp_espacio.id",$id_espacio)->get();
        if(isset($espacios[0])){
            $espacio = $espacios[0];
            if($espacio->foto){
                $espacio->foto = 'https://api.sportodos.com/images/'.$espacio->foto;
            }
            $datainfo = [];
            if(isset($espacio->nombre_punto)){
                $datainfo['nombre_punto'] = $espacio->nombre_punto;
                $datainfo['telefono'] = $espacio->telefono;
                $datainfo['direccion'] = $espacio->direccion;
                $espacio['dataInfo'] = $datainfo;
            }
            return $espacio;
        } else {
            return false;
        }
    }
}
