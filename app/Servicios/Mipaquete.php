<?php 

namespace App\Servicios;
use Illuminate\Support\Facades\Http;
use App\Models\Servicios\Togroow\Compra;
use App\Models\Mipaquete as ModelMipaquete;

class Mipaquete
{
    public $url = 'https://api-v2.mpr.mipaquete.com/';

    public function enviarPeticion($metodo,$data,$tipo = 0,$api = ''){
        try {

            /*echo "<pre>";
            print_r($data);
            echo "</pre>";*/
            //$url = "https://api-v2.dev.mpr.mipaquete.com/".$metodo;
            $url = $this->url.$metodo;
            $ch = curl_init();
            $header = [];
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $header[] = "Content-Type: application/json";
            $header[] ="session-tracker: a0c96ea6-b22d-4fb7-a278-850678d5429c";
           
            if( $api != null){
                //echo "token:".Session::getInstance()->get('mercadopagokey');
                $token = $api;
                $header[] = "apikey: ".$token;
            }
            curl_setopt($ch, CURLOPT_HTTPHEADER,$header);
            if(isset($tipo) && $tipo == 1){
                curl_setopt($ch, CURLOPT_URL,$url);
                curl_setopt($ch, CURLOPT_POST, TRUE);
                curl_setopt($ch, CURLOPT_POSTFIELDS,  json_encode($data));

            } else if(isset($tipo) && $tipo == 2) {
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
            } else {
                if( count($data) > 0 ) {
                    $query = http_build_query($data);
                    curl_setopt($ch, CURLOPT_URL, "$url?$query");
                } else {
                    curl_setopt($ch, CURLOPT_URL, $url);
                }
            }
            $result = curl_exec($ch);
            if ($result === false) {
                throw new Exception(curl_error($ch), curl_errno($ch));
            } else{
                $data = json_decode($result, JSON_UNESCAPED_UNICODE);
                curl_close($ch);
                return  $data;
            }
        } catch(Exception $e) {
            echo $e->getCode()." ".$e->getMessage();
            //trigger_error(sprintf('Curl failed with error #%d: %s',$e->getCode(), $e->getMessage()),E_USER_ERROR);
        }
    }

    public function consultarcompra($idcompra){
        $compra = Compra::find($idcompra);
        $mipaquete = ModelMipaquete::find(1);
        $fechacompra = $compra->negocio_compra_fecha;
        if($fechacompra == ''){
            $fechacompra = date("Y-m-d");  
        }
        $data = [];
        $data['mpCode'] = (int) $compra->negocio_compra_mpcode;
        $data["confirmationDate"] = [];
        $data["confirmationDate"]['init'] = $fechacompra;
        $data["confirmationDate"]['end'] = date("Y-m-d");
        $data["pageSize"]= 25;
        $resultados = $this->enviarPeticion("getSendings/1",$data,1,$mipaquete->apikey);
        if(isset($resultados['sendings'][0])){
            return $resultados['sendings'][0];
        } else {
            return false;
        }
        /*echo "<pre>";
        print_r($resultados);
        echo "</pre>";*/
    }

}
