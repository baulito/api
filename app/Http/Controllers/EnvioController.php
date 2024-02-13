<?php
namespace App\Http\Controllers\Togroow;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Mockery\Exception;
use App\Services\Mipaquete\Mipaquete;
use App\Models\Servicios\Togroow\Mipaquete as NegocioMipaquete;
use App\Models\Servicios\Togroow\Useraddress;

/**
 * @group  Compra de productos
 * clase  con los productos de togroow
 */

class EnvioController extends Controller
{

    public function ciudades(){
        $negocio = NegocioMipaquete::orderBy("id",'ASC')->first();
        $ciudades = Mipaquete::request('getLocations',[],0,$negocio->apikey);
        $orderciudades = '';
        foreach ($ciudades as $key => $ciudad) {
            $orderciudades[$key] = $ciudad['locationName'];
        }
        echo "<pre>";
        print_r($orderciudades);
        echo "</pre>";
        array_multisort($orderciudades, SORT_ASC, $ciudades);
        return response()->json($ciudades, 200, [], JSON_NUMERIC_CHECK);
    }

    public function ciudadesformat(){
        $negocio = NegocioMipaquete::orderBy("id",'ASC')->first();
        $ciudades = Mipaquete::request('getLocations',[],0,$negocio->apikey);
        $arryc = [];
        foreach ($ciudades as $key => $ciudad) {
            $arryc[$ciudad['locationCode']] = $ciudad['locationName'].", ".$ciudad['departmentOrStateName'];
        }
        return $arryc;
    }

    public function namedirecciones(){
        $address = Useraddress::orderBy("id",'ASC')->get();
        $ciudades = $this->ciudadesformat();
        foreach ($address as $key => $dir) {
            if(isset($ciudades[$dir->ciudad])){
                $dir->ciudadnombre = $ciudades[$dir->ciudad];
            }
        }
    }

    public function principal(){

    }

}