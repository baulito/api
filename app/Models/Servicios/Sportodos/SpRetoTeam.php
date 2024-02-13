<?php

namespace App\Models\Servicios\Sportodos;


use Illuminate\Database\Eloquent\Model;
use App\Models\Servicios\Sportodos\SpEspacio;
use App\Models\Servicios\Sportodos\SpEquipo;
use App\Models\Servicios\Togroow\Usuarios;

class SpRetoTeam extends Model
{
    protected $table = "sp_reto_equipo";
    protected $fillable = [ 'reto_id', 'equipo_id', 'local'];
    protected $guarded = ['id'];
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function equipo(){
        return $this->belongsTo(SpDeporte::class,'equipo_id', 'id');
    }

    public static function formarTeam($idreto){
        $arrayteam = [];
        $tipos = [];
        $tipos[''] = "V";
        $tipos[0] = "V";
        $tipos[1] = "L";
        $teams = self::where("reto_id",$idreto)->get();
        foreach ($teams as $key => $team) {
            $equipo = SpEquipo::formatsimpleequipo($team->equipo_id);
            $arrayteam[$key] = [];
            $arrayteam[$key]['teamId'] = $team->equipo_id;
            $arrayteam[$key]['name'] = $equipo['nombre'];
            $arrayteam[$key]['shieldPicture'] = $equipo['foto_escudo'];
            $arrayteam[$key]['sportId'] = $equipo['deporte_id'];
            $arrayteam[$key]['owner'] = 0;
            $arrayteam[$key]['type'] = $tipos[$team->local];
        }
        return $arrayteam;
    }
    
}
