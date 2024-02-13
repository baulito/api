<?php
namespace App\Models\Servicios\Togroow;
use Illuminate\Database\Eloquent\Model;
use App\Models\Servicios\Togroow\Itemscompra;
use App\Models\Servicios\Togroow\Negocio;

class Compra extends Model
{
    protected $table = "negocio_compra";
    protected $fillable = ['negocio_compra_fecha', 'negocio_compra_hora', 'negocio_compra_usuario', 'negocio_compra_estado', 'negocio_compra_estado_texto', 'negocio_compra_id_pago', 'negocio_compra_tipodocumento', 'negocio_compra_documento', 'negocio_compra_razonsocial', 'negocio_compra_nombre', 'negocio_compra_correo', 'negocio_compra_telefono', 'negocio_compra_celular', 'negocio_compra_direccion', 'negocio_compra_ciudad', 'negocio_compra_pais', 'negocio_compra_observacion', 'negocio_compra_lugar_envio', 'negocio_compra_subtotal', 'negocio_compra_valor_envio', 'negocio_compra_valor', 'negocio_compra_idpago', 'negocio_compra_idmp', 'negocio_compra_medio', 'negocio_compra_negocio', 'negocio_compra_url', 'negocio_compra_mpcode', 'negocio_compra_mipaquete','negocio_compra_urlefecty','negocio_compra_desde','negocio_compra_tipopago','negocio_compra_tipoenvio'];
    protected $primaryKey = 'negocio_compra_id';
    public $timestamps = false;

    public function items()
    {
        return $this->hasMany(Itemscompra::class,'negocio_compra_item_compraid');
    }

    public function negocio()
    {
        return $this->hasOne(Negocio::class,'registro_id','negocio_compra_negocio');
    }
    
}