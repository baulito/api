<?php

namespace App\Models\Servicios\Sportodos;


use Illuminate\Database\Eloquent\Model;
use App\Models\Servicios\Sportodos\SpEspacio;
use App\Models\Servicios\Togroow\Usuarios;

class SpRetoParticipante extends Model
{
    protected $table = "sp_reto_participante";
    protected $fillable = [ 'user_id', 'reto_id', 'local', 'estado','equipo_id'];
    protected $guarded = ['id'];
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function usuario(){
        return $this->belongsTo(SpUsuario::class, 'user_id', 'id');
    }



    public static function participantes($id){
        $participantes = self::where("reto_id",$id)->get();
        $json = [];
        foreach ($participantes as $key => $participante) {
            $json[$key] = [];
            $json[$key]['challenge_id'] = $participante->reto_id;
            $json[$key]['teamId'] = $participante->local;
            $json[$key]['challengeStatusResponse'] = $participante->estado;
            $json[$key]['user'] = Usuarios::formatsimple($participante->user_id);
        }
        return $json;
    }
    
}
