<?php

namespace App\Models\Servicios\Sportodos;

use Illuminate\Database\Eloquent\Model;

class SpBarrera extends Model
{
    protected $table = "sp_barrera";
    protected $fillable = ['nombre','tipo'];
    protected $guarded = ['id'];
    protected $primaryKey = 'id';
    public $timestamps = true;


    public function usuarios() {
        return $this->belongsToMany(SpUsuario::class, 'sp_barrera_usuario', 'barrera_id', 'user_id');
    }
}
