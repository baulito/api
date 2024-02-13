<?php

namespace App\Models\Servicios\Togroow;


use Illuminate\Database\Eloquent\Model;
use App\Models\Servicios\Togroow\Compra;
use App\Models\Servicios\Togroow\Productos;


class Itemscompra extends Model
{
    protected $table = "negocio_compra_item";
    protected $fillable = ['negocio_compra_item_compraid', 'negocio_compra_item_idproducto', 'negocio_compra_item_nombre', 'negocio_compra_item_imagen', 'caracteristicas', 'caracteristicastxt', 'negocio_compra_item_cantidad', 'negocio_compra_item_valor', 'negocio_compra_item_moneda', 'negocio_compra_item_valorenvio', 'negocio_compra_item_mipaquete', 'negocio_compra_item_enviotipo'];
    protected $primaryKey = 'negocio_compra_item_id';
    public $timestamps = false;

    public function compra()
    {
        return $this->belongsTo(Compra::class, 'negocio_compra_id', 'negocio_compra_item_compraid');
    }

    public function producto()
    {
        return $this->hasOne(Productos::class, 'store_producto_id', 'negocio_compra_item_idproducto');
    }
}