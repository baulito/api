<?php

namespace App\Models;

use App\Models\Servicios\Togroow\Mipaqueteciudades;
use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
    protected $table = "campus";
    protected $fillable = ['name', 'country', 'city', 'address', 'additional', 'phone1', 'phone2', 'image', 'description', 'order','dispatch'];
    protected $guarded = ['id'];
    public $timestamps = true;

    public static function campusformat($id){
        $campus = self::find($id);
        $campus->cityname = $campus->cityname();
        return $campus;
    }

    public function cityname(){
        $city = Mipaqueteciudades::find($this->city);
        return $city->ciudad." - ".$city->departamento;
    }
}
