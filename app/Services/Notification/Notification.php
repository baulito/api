<?php 
namespace App\Services\Notification;

use App\Models\Servicios\Togroow\Compra;
use App\Models\Servicios\Togroow\Itemscompra;
use App\Models\Servicios\Togroow\Negocio;
use App\Models\Servicios\Togroow\Productos;
use App\Models\Mipaquete;
use App\Services\Mipaquete\Empaque;
use App\Services\Mipaquete\Mipaquete as Servicemipaquete;
use App\Models\Servicios\Togroow\Useraddress;
use App\Models\Servicios\Togroow\Mercadopago;
use App\Models\Servicios\Togroow\Productosopcioncaracteristica;
use App\Services\Mercadopago\Mercadopagos as Servicemercadopago;
use App\Models\Servicios\Togroow\Productoscantidades;
use App\Models\Servicios\Togroow\Mipaqueteciudades;
use App\Models\Servicios\Togroow\Negociopuntos;
use Mail;
use App\Mail\Compraemail;




class Notification
{

    public static function compra($id){
        $data = [];
        $compra = Compra::find($id);
        $items = Itemscompra::where("negocio_compra_item_compraid",$id)->get();
        $data['detallecarro'] = $compra;
        $data['itemscarrito'] = $items;
        $infoenvio = Mipaquete::find(1);
        $dataenvio['email'] = "notificaciones@togroow.com";
        $dataenvio['de'] = "Notificaciones Togroow";
        $dataenvio['sujet'] = "Comprobante de compra no. ".$compra->negocio_compra_id." en TOGROOW";
        if(isset($infoenvio)){
            $dataenvio['email'] = $infoenvio->correo;
            $dataenvio['email'] = "notificaciones@togroow.com";
            $dataenvio['de'] = "Baulito";
            $dataenvio['sujet'] = "Comprobante de compra no. ".$compra->negocio_compra_id;
        }
        //Mail::to($compra->negocio_compra_correo)->send(new Compraemail($data,$dataenvio));
        $dataenvio['email'] = "notificaciones@togroow.com";
        $dataenvio['de'] = "Notificaciones Togroow";
        $dataenvio['sujet'] = "Orden de pedido No. ".$compra->negocio_compra_id." en Togroow";
        

        $correo = $compra->negocio_compra_correo;
        $correonegocio = "alos1212@gmail.com";
        if($correo == $correonegocio ){
            Mail::to($correo)->send(new Compraemail($data,$dataenvio));
        } else {
            Mail::to($correo)->cc([$correonegocio])->send(new Compraemail($data,$dataenvio));
        }
        

    }

}