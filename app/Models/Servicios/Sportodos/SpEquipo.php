<?php

namespace App\Models\Servicios\Sportodos;

use Illuminate\Database\Eloquent\Model;
use App\Models\Servicios\Sportodos\SpDeporte;
use DB;

class SpEquipo extends Model
{

    protected $table = "sp_equipo";
    protected $fillable = ['creador_id', 'nombre', 'descripcion', 'deporte_id', 'foto', 'portada','ciudad_id'];
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function deporte(){
        return $this->belongsTo(SpDeporte::class,'deporte_id', 'id');
    }

    public function usuario(){
        return $this->belongsTo(SpUsuario::class, 'creador', 'id');
    }

    public function miembros() {
        return $this->hasMany(SpMiembroEquipo::class, 'equipo_id', 'id');
    }

    public static function equiposUsuario($user){
        $data =  DB::table('sp_equipo')->whereExists(function ($query) use ($user) {
            $query->select("*")
                ->from('sp_equipo_usuario')
                ->whereRaw('sp_equipo_usuario.equipo_id = sp_equipo.id')
                ->whereRaw('sp_equipo_usuario.user_id = '.$user);
        })->OrWhere("sp_equipo.creador_id",$user)->get();
        return $data;
    }

    public static function busqueda($filtros){
        $consulta = DB::table('sp_equipo');
        if(isset($filtros['deporte_id']) && $filtros['deporte_id'] > 0 ){
            $consulta->where('deporte_id',$filtros['deporte_id']);
        }
        if(isset($filtros['team_id']) && $filtros['team_id'] > 0 ){
            //echo "entro al team";
            $consulta->where('id',$filtros['team_id']);
        }
        if(isset($filtros['ciudad_id']) && $filtros['ciudad_id'] > 0 ){
            $consulta->where('ciudad_id',$filtros['ciudad_id']);
        }
        if(isset($filtros['dueno_id']) && $filtros['dueno_id'] > 0 ){
            $consulta->where('creador_id',$filtros['dueno_id']);
        }
        if(isset($filtros['nombre'])){
            $consulta->where('nombre','LIKE',"%".$filtros['nombre']."%");
        }
        return $consulta->get();
    }

    public static function formatsimpleequipo($id){
        $team = self::find($id);
        $data = [];
        $data['equipo_id'] = (int)$team->id;
        $data['nombre'] = $team->nombre;
        $data['deporte_id'] = $team->deporte_id;
        if(isset($team->foto)){
            $data['foto_escudo'] = 'https://api.sportodos.com/images/'.$team->foto;
        } else {
            $data['foto_escudo'] = 'https://api.sportodos.com/skins/sistem/images/escudo.png';
        }
        return $data;
    }

}
