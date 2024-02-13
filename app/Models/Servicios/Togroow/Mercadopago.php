<?php
namespace App\Models\Servicios\Togroow;
use Illuminate\Database\Eloquent\Model;


class Mercadopago extends Model
{
    protected $table = "negocio_mercadopago";
    protected $fillable = ['negocio_mercadopago_negocio', 'negocio_mercadopago_token', 'negocio_mercadopago_key', 'negocio_mercadopago_refresch', 'negocio_mercadopago_user', 'negocio_mercadopago_expire', 'negocio_mercadopago_fecharenovacion'];
    protected $primaryKey = 'negocio_mercadopago_id';
}