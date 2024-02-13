<?php

namespace App\Models\Servicios\Sportodos;

use Illuminate\Database\Eloquent\Model;

class SpIniciativa extends Model
{
    protected $table = "sp_iniciativa";
    protected $fillable = ['categoria', 'nombre', 'descripcion', 'foto', 'portada'];
    protected $guarded = ['id'];
    protected $primaryKey = 'id';
    public $timestamps = true;


    public static function formarIniciativa($id){
        $iniciativa = self::where("id",$id)->get();
        $data = [];
        if(isset($iniciativa[0])){
            $data['id'] = $iniciativa[0]->id;
            $data['name'] = $iniciativa[0]->nombre;
            $data['description'] = $iniciativa[0]->descripcion;
            if(isset($iniciativa[0]->imagen)){
                $data['imagen'] = 'https://api.sportodos.com/images/'.$iniciativa[0]->imagen;
            } else {
                $data['imagen'] = 'https://api.sportodos.com/skins/sistem/images/escudo.png';
            }
            if(isset($iniciativa[0]->portada)){
                $data['portada'] = 'https://api.sportodos.com/images/'.$iniciativa[0]->portada;
            }
            $data['iniciativetype'] = SpIniciativacategoria::formarCategoria($iniciativa[0]->categoria);
        }
        return $data;
    }
}
