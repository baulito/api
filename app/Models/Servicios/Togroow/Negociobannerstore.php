<?php
namespace App\Models\Servicios\Togroow;
use Illuminate\Database\Eloquent\Model;
use App\Models\Servicios\Togroow\Mipaquete;

class Negociobannerstore extends Model
{
    protected $table = "store_negocio_banner";
    protected $fillable = ['imagen','negocio'];
    protected $primaryKey = 'id';

    public function negocio()
    {
        return $this->hasOne(Negocio::class, 'registro_id','negocio');
    }
}