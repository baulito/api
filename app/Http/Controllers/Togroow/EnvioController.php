<?php
namespace App\Http\Controllers\Togroow;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Mockery\Exception;
use App\Services\Mipaquete\Mipaquete;
use App\Models\Servicios\Togroow\Mipaquete as NegocioMipaquete;
use App\Models\Servicios\Togroow\Mipaqueteciudades;
use App\Models\Servicios\Togroow\Useraddress;

/**
 * @group  Compra de productos
 * clase  con los productos de togroow
 */

class EnvioController extends Controller
{

    public function ciudades(){
        $aciudades = Mipaqueteciudades::orderBy("ciudad")->get();
        if(count($aciudades) == 0){
            $aciudades = Mipaqueteciudades::orderBy("ciudad")->get();
        }
        $ciudades = [];
        $orderciudades = [];
        foreach ($aciudades as $key => $ciudad) {
            $ciudades[$key] = [];
            $ciudades[$key]["locationName"] = $ciudad->ciudad;
            $ciudades[$key]["departmentOrStateName"] = $ciudad->departamento;
            $ciudades[$key]["locationCode"] = $ciudad->id;
            $orderciudades[$key] = $ciudad->ciudad;
        }
        array_multisort($orderciudades, SORT_ASC,SORT_STRING,$ciudades);
        return response()->json($ciudades, 200, [], JSON_NUMERIC_CHECK);
    }
     public function cargarciudades(){
        $negocio = NegocioMipaquete::orderBy("id",'ASC')->first();
        $ciudades = Mipaquete::request('getLocations',[],0,$negocio->apikey);
        foreach ($ciudades as $key => $ciudad) {
            $data = [];
            $data['id'] = $ciudad['locationCode'];
            $data['ciudad'] = $ciudad['locationName'];
            $data['departamento'] = $ciudad['departmentOrStateName'];
            $data['pais'] = "CO";
            if(!Mipaqueteciudades::find($data['id'])){
                Mipaqueteciudades::insert($data);
            }
        }
    }

    public function ciudadesformat(){
        $aciudades = Mipaqueteciudades::orderBy("ciudad")->get();
        if(count($aciudades) == 0){
            $this->cargarciudades();
            $aciudades = Mipaqueteciudades::orderBy("ciudad")->get();
        }
        $ciudades = [];
        foreach ($aciudades as $key => $ciudad) {
            $ciudades[$ciudad->id] = $ciudad->ciudad." , ".$ciudad->departamento;
        }
        return $ciudades;
    }

    public function namedirecciones(){
        $address = Useraddress::orderBy("id",'ASC')->get();
        $ciudades = $this->ciudadesformat();
        foreach ($address as $key => $dir) {
            if(isset($ciudades[$dir->ciudad])){
                $dir->ciudadnombre = $ciudades[$dir->ciudad];
                $dir->save();
            }
        }
    }

    public function principalChange($id){
        $user  = auth()->user();
        $principal = Useraddress::find($id);
        if( isset($principal) && $principal->user_id == $user->user_id ){
            Useraddress::where("user_id",$user->user_id)->update(["principal"=>0]);
            $principal->principal = 1;
            $principal->save();
        }
        $address = Useraddress::where("user_id",$user->user_id)->orderBy("id","DESC")->get();
        return response()->json($address, 200, [], JSON_NUMERIC_CHECK);
    }

    public function new(Request $request){
        $user  = auth()->user();
        Useraddress::where("user_id",$user->user_id)->update(["principal"=>0]);
        $data = $request->all();
        $ciudades = $this->ciudadesformat();
        $data['user_id'] = $user->user_id;
        $data['principal'] = 1;
        if(isset($ciudades[$data['ciudad']])){
            $data['ciudadnombre'] =$ciudades[$data['ciudad']];
        }
        $data = Useraddress::insert($data);
        $address = Useraddress::where("user_id",$user->user_id)->orderBy("id","DESC")->get();
        return response()->json($address, 200, [], JSON_NUMERIC_CHECK);
    }

    public function update(Request $request){
        $user  = auth()->user();
        $data = $request->all();
        if( isset($data['id']) && $data['id'] > 0 ){
            $id = $data['id'];
            $address = Useraddress::find($id);
            if(isset($address) && isset($address->id)){
                $ciudades = $this->ciudadesformat();
                if(isset($ciudades[$data['ciudad']])){
                    $data['ciudadnombre'] =$ciudades[$data['ciudad']];
                }
                $address->update($data);
            }
            $address = Useraddress::where("user_id",$user->user_id)->orderBy("id","DESC")->get();
            return response()->json($address, 200, [], JSON_NUMERIC_CHECK);
        }
       
    }

    public function delete($id){
        $user  = auth()->user();
        if( isset($id) ){
            $address = Useraddress::find($id);
            if(isset($address) && isset($address->id)){
                $address->delete();
            }
        }
        $address = Useraddress::where("user_id",$user->user_id)->orderBy("id","DESC")->get();
        return response()->json($address, 200, [], JSON_NUMERIC_CHECK);
    }

}