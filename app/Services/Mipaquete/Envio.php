<?php 
namespace App\Services\Mipaquete;

use App\Models\Campus;
use App\Models\Servicios\Togroow\Compra;
use App\Models\Servicios\Togroow\Itemscompra;
use App\Services\Mipaquete\Mipaquete;
use App\Models\Mipaquete as ModelMipaquete;


class Envio
{

    public static function  generarEnvio($idcompra){
        $compra = Compra::find($idcompra);
        $idnegocio = $compra->negocio_compra_negocio;
        $mipaquete = ModelMipaquete::find(1);
        $paquetes = self::calcularPaquetes($idcompra);
        $cupo = self::comprobarCupo();
        $valorpaquetes = self::calularValores($paquetes,$compra->negocio_compra_ciudad);
        $codigosmp = "";
        if( $cupo['cash'] >= $valorpaquetes['valortotal']){
            $envio = [];
            $envio['receiver'] = [];
            $envio['receiver']['name'] =  $compra->negocio_compra_nombre;
            $envio['receiver']['surname'] = " - ";
            $envio['receiver']['cellPhone'] =  $compra->negocio_compra_celular;
            $envio['receiver']['prefix'] = "+57";
            $envio['receiver']['email'] = $compra->negocio_compra_correo;
            $envio['receiver']['nit'] = "123456789";
            $envio['receiver']['nitType'] = "CC";
            $envio['receiver']["destinationAddress"] = $compra->negocio_compra_direccion;
            foreach ($paquetes as $key => $paquete) {
                $campus = Campus::find($paquete['campus']);
                $envio['sender'] = []; 
                $envio['sender']['name'] = $campus->name;
                $envio['sender']['surname'] = " - ";
                $envio['sender']['cellPhone'] = $campus->phone1;
                $envio['sender']['prefix'] = "+57";
                $envio['sender']['email'] = "elbaulitodemrbean@gmail.com";
                $envio['sender']['nit'] = "123456789";
                $envio['sender']['nitType'] = "NIT";
                $envio['sender']["pickupAddress"] = $campus->address." ".$campus->additional;

                $envio['productInformation'] = [];
                $envio['productInformation']['quantity'] = 1;
                $envio['productInformation']['width'] = (int)$paquete['ancho'];
                $envio['productInformation']['large'] = (int)$paquete['largo'];
                $envio['productInformation']['height'] = (int)$paquete['alto'];
                $envio['productInformation']['weight'] = (float)$paquete['peso'];
                $envio['productInformation']['forbiddenProduct'] = "false";
                $envio['productInformation']['productReference'] = "Venta Productos";
                $envio['productInformation']['declaredValue'] = $paquete['valor'];

                $envio['locate'] = [];
                $envio['locate']['originDaneCode'] =  $paquete['origen'];
                $envio['locate']['destinyDaneCode'] = $compra->negocio_compra_ciudad;

                $envio["channel"] = "Venta Sistema";
                $envio["deliveryCompany"] = $valorpaquetes['empresas'][$key]['deliveryCompanyId'];
                $envio["description"] =  "Venta de productos Baulito";
                $envio["comments"] =  " ";
                $envio["paymentType"] =  101;
                $envio["valueCollection"] =  0;
                $envio["requestPickup"] =  true;
                $envio["adminTransactionData"] = [];
                $envio["adminTransactionData"]['saleValue'] = $paquete['valor'];
                $resultadocompra = Mipaquete::generarEnvio($envio,$mipaquete->apikey);
                if(isset($resultadocompra['mpCode'])){
                    if($codigosmp == ""){
                        $codigosmp = $resultadocompra['mpCode'];
                    } else {
                        $codigosmp = $codigosmp.",".$resultadocompra['mpCode'];
                    }
                }
            }
        }
        if($codigosmp!= ''){
            $compra->negocio_compra_mpcode = $codigosmp;
            $compra->save();
        }
    }

    public static function calcularPaquetes($idcompra){
        echo $idcompra."<br>";
        /*$items = Itemscompra::where("negocio_compra_item_compraid",$idcompra)->get();
        echo "<pre>";
        print_r($items);
        echo "</pre>";

        /*$productos = [];
        foreach ($items as $key => $item) {
            $producto = $item->producto();
            if(isset($producto)){
                $producto->cantidaditem = $item->negocio_compra_item_cantidad;
                $productos[$key] = $producto;
            }
            
        }*/
        
        /*
        $paquetes = Empaque::calcularempaque($productos);
        return $paquetes;*/
    }

    public static function comprobarCupo(){
        $mipaquete = ModelMipaquete::find(1);
        $data = Mipaquete::consultarusuario($mipaquete->apikey);
        return $data;
    }

    public static function calularValores($paquetes,$destino){
        $mipaquete = ModelMipaquete::find(1);
        $valorpaquete = [];
        $valorpaquete['empresas'] = [];
        $valorpaquete['valortotal'] = 0;
        foreach ($paquetes as $key => $paquete) {
            $infoenvio = Mipaquete::calcularvalor($paquete['origen'],$destino,$paquete['alto'],$paquete['largo'],$paquete['ancho'],$paquete['peso'],$paquete['valor'],$paquete['valor'],$mipaquete->apikey);
            if(isset($infoenvio[0])){
                $valorpaquete['empresas'][$key] = $infoenvio[0];
                $valorpaquete['valortotal'] = $valorpaquete['valortotal']+$infoenvio[0]['shippingCost'];
            }
        }
        return $valorpaquete;
    }

    public static function  cancelarEnvio($idcompra){
        $compra = Compra::find($idcompra);
        $mipaquete = ModelMipaquete::find(1);
        if($compra->negocio_compra_mpcode != null || $compra->negocio_compra_mpcode != '' ){
            $mpcodes = explode(",",$compra->negocio_compra_mpcode);
            foreach ($mpcodes as $key => $mpc) {
                if($mpc != ''){
                    Mipaquete::cancelarenvio($mpc,$mipaquete->apikey);
                }
            }
        }
        $compra->negocio_compra_mpcode = "";
        $compra->save();
    }


    public static function consultarEnvios($idcompra){
        $compra = Compra::find($idcompra);
        $mipaquete = ModelMipaquete::find(1);
        $fechacompra = $compra->negocio_compra_fecha;
        $envios = [];
        if($compra->negocio_compra_mpcode != null || $compra->negocio_compra_mpcode != '' ){
            $mpcodes = explode(",",$compra->negocio_compra_mpcode);
            foreach ($mpcodes as $key => $mpcode) {
                if($mpcode != ''){
                    $enviod = Mipaquete::consultarenvios($mipaquete->apikey,$mpcode,$fechacompra);
                    $envioformat = [];
                    if(isset($enviod['pdfGuide'][0])){
                        $envioformat['pdfGuide'] = $enviod['pdfGuide'][0];
                    }
                    $envioformat['estadoactual'] = $enviod['Estado actual del envío'];
                    $envioformat['transportadora'] = $enviod['Transportadora'];
                    $envioformat['desde'] = $enviod['Nombre del remitente'];
                    $envioformat['guide'] = $enviod['Número de Guía'];
                    $envioformat['seguimiento'] = [];
                    foreach ($enviod['tracking'] as $key2 =>  $tracking) {
                        if($key2 > 0){
                            $datat = [];
                            $datat['fecha'] = date("Y-m-d",strtotime($tracking['date']));
                            $datat['estado'] =$tracking['updateState'];
                            array_push($envioformat['seguimiento'],$datat);
                        }
                    } 
                    $envios[$key] = $envioformat;
                }
            }
        }
        return $envios;
    }

    public static function  validarGeneracionenvio($idcompra){
        $compra = Compra::find($idcompra);
        /*echo "<pre>";
        print_r($compra)*/;
        $paquetes = self::calcularPaquetes($idcompra);
         /*echo "<pre>";
        print_r($paquetes);
        /*$cupo = self::comprobarCupo();
        $valorpaquetes = self::calularValores($paquetes,$compra->negocio_compra_ciudad);
        $res = [];
        if( $cupo['cash'] >= $valorpaquetes['valortotal']){
            $res['susses'] = true;
        } else {
            $res['susses'] =  false;
            $res['message'] = "Recarga la cuenta de mercadopago para poder generar el envio ya que solo dispones de $".number_format($cupo['cash']);
        }
        return $res;*/
    }

}
    