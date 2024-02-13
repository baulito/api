<?php

namespace App\Models\Servicios\Sportodos;

use Illuminate\Database\Eloquent\Model;

class SpIniciativacategoria extends Model
{
    protected $table = "sp_iniciativa_categoria";
    protected $fillable = ['nombre', 'descripcion','imagen'];
    protected $guarded = ['id'];
    protected $primaryKey = 'id';
    public $timestamps = true;


    public static function formarCategoria($id){
        $iniciativa = self::where("id",$id)->get();
        $data = [];
        if(isset($iniciativa[0])){
            $data['id'] = $iniciativa[0]->id;
            $data['name'] = $iniciativa[0]->nombre;
            $data['desc'] = $iniciativa[0]->descripcion;
            if(isset($iniciativa[0]->imagen)){
                $data['pic'] = 'https://api.sportodos.com/images/'.$iniciativa[0]->imagen;
            } else {
                $data['pic'] = 'https://api.sportodos.com/skins/sistem/images/escudo.png';
            }
        }
        return $data;
    }
}
