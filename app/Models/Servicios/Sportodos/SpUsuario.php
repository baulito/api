<?php

namespace App\Models\Servicios\Sportodos;

use App\Models\Servicios\Sportodos\SpBarrera;
use Illuminate\Database\Eloquent\Model;
use App\Models\Seguridad\User;

class SpUsuario extends Model
{
    //
    protected $table = "sp_usuario";
    protected $fillable = ['user_id', 'peso', 'altura', 'fecha_nacimiento','deporte_id','posicion_id'];
    //protected $guarded = ['user_id'];
    protected $primaryKey = 'user_id';
    public $timestamps = true;
    public $incrementing = false;
    protected $casts = [ 'user_id' => 'integer', 'peso' => 'float', 'altura' => 'float', 'deporte_id' => 'integer','posicion_id' => 'integer',];

    public function usuario()
    {
        return $this->belongsTo(User::class,'user_id', 'user_id');
    }

    public function barreras()
    {
        return $this->belongsToMany(SpBarrera::class,'sp_barrera_usuario', 'user_id', 'barrera_id');
    }

    public function deportes()
    {
        return $this->belongsToMany(SpDeporte::class, 'sp_deporte_usuario', 'user_id', 'deporte_id');
    }

    public function equipos()
    {
        return $this->hasMany(SpEquipo::class, 'creador_id', 'user_id');
    }

    
}