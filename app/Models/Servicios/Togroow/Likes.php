<?php

namespace App\Models\Servicios\Togroow;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Likes extends Model
{
    protected $table = "megusta";
    protected $fillable = ['megusta_user','megusta_tipo_contenido','megusta_id_contenido'];
    protected $primaryKey = 'megusta_id';
    public $timestamps = false;


    
    public static function getCount($contenido,$tipo){
        $results = self::where('megusta_tipo_contenido',$tipo)->where('megusta_id_contenido',$contenido)->get();
        return count($results);
    }

    public static function getLikes($contenido,$tipo){
        $results = self::where('megusta_tipo_contenido',$tipo)->where('megusta_id_contenido',$contenido)->leftJoin('user', 'user.user_id', '=', 'like.like_usuario')->get();
        return $results;
    }

    public static function getLikeMe($contenido,$tipo,$usuario){
        $results = self::where('megusta_tipo_contenido',$tipo)->where('megusta_id_contenido',$contenido)->where("megusta_user",$usuario)->get();
        if(count($results)>0){
            return 1;
        } else {
            return 0;
        }
        return count($results);
    }
}