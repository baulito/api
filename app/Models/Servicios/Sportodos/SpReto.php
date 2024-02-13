<?php

namespace App\Models\Servicios\Sportodos;


use Illuminate\Database\Eloquent\Model;
use App\Models\Servicios\Sportodos\SpEspacio;
use App\Models\Servicios\Togroow\Usuarios;
use App\Models\Servicios\Sportodos\SpDeporte;
use App\Models\Servicios\Sportodos\SpRetoParticipante;
use App\Models\Servicios\Sportodos\SpRetoTeam;
use App\Models\Servicios\Sportodos\SpIniciativa;

class SpReto extends Model
{
    protected $table = "sp_reto";
    protected $fillable = [ 'user_id', 'deporte_id', 'fecha', 'tipo', 'espacio_id','ciudad_id','descripcion', 'reserva', 'tipo_acceso', 'tarifa', 'clase', 'estado', 'calificacion', 'capacidad','duracion','iniciativa'];
    protected $guarded = ['id'];
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function deporte(){
        return $this->belongsTo(SpDeporte::class,'deporte_id', 'id');
    }

    public function iniciativa(){
        return $this->belongsTo(SpIniciativa::class,'iniciativa', 'id');
    }

    public static function format($id){
        $reto = self::find($id);
        if(isset($reto)){
            $data = [];
            $data['id'] = $reto->id;
            $data['user'] = Usuarios::formatsimple($reto->user_id);
            $data['sport_id'] = (int)$reto->deporte_id;
            $data['city_id'] = (int)$reto->ciudad_id;
            $data['date'] = date('c', strtotime($reto->fecha));
            $data['type'] = (int)$reto->tipo;
            $data['space'] = SpEspacio::espacioformat($reto->espacio_id);
            $data['hasBooking'] = $reto->reserva;
            $data['accessType'] = $reto->tipo_acceso;
            $data['rate'] = $reto->tarifa;
            $data['booking'] = null;
            $data['challengeScope'] = (int)$reto->clase;
            $data['challengeCompetitors'] = SpRetoParticipante::participantes($reto->id);
            $data['status'] = (int)$reto->estado;
            $data['capacity'] = (int)$reto->capacidad;
            $data['rating'] = 0;
            $data['description'] = $reto->descripcion;
            $data['duration'] = (int)$reto->duracion;
            $data['teams'] =SpRetoTeam::formarTeam($reto->id);
            $data['iniciativa'] = SpIniciativa::formarIniciativa($reto->iniciativa);
            return $data;
        } else {
            return false;
        }
    }

    
}
