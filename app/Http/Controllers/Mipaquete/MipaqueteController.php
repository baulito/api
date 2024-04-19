<?php
namespace App\Http\Controllers\Mipaquete;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Mipaquete as ModelsMipaquete;
use App\Services\Mipaquete\Mipaquete;

class MipaqueteController extends Controller
{
    
    public function login(Request $request ){
        $data = $request->all();
        if(isset($data["email"]) && isset($data["password"])){
            $login = [];
            $login["email"] =  strtolower($data["email"]);
            $login["password"] = $data["password"];
            $resultado =  Mipaquete::request('generateapikey',$login,1);
            if(isset($resultado['APIKey'])){
                $actual = ModelsMipaquete::find(1);
                $actual->correo = $login["email"];
                $actual->apikey = $resultado['APIKey'];
                $actual->save();
            }

            return response()->json($resultado);    
        }
    }

    public function detail( ){
        $actual = ModelsMipaquete::find(1);    
        return response()->json($actual);    
    }
}