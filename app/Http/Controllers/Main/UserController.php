<?php
namespace App\Http\Controllers\Main;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Seguridad\Usuario;
use App\Models\Usuarios;
use Illuminate\Support\Facades\Storage;
use App\Services\Images\Images;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\Hash;

/**
 * @group  Categoria de productos
 */

class UserController extends Controller
{

    public function list(Request $request){
        $data = $request->all();
        $contents = Usuarios::orderBy("created_at","DESC");
        if(isset($data['search'])){
            $contents = Usuarios::search($data['search']);
        } else {
            $contents = Usuarios::orderBy("created_at","DESC");
        }

        if(isset($data['level'])){
            $contents->where("user_level",$data['level']);
        }

        $paginate = 40;
        if(isset($data['paginate'])){
            $paginate = $data['paginate'];
        }
        $contents = $contents->paginate($paginate);
        foreach ($contents as $key => $content) {
            if(isset($content->user_foto) && file_exists(public_path("/images/".$content->user_foto))){
                $content->thumbnail =  url('/')."".Images::ImageResize($content->user_foto,200);
            }
        }
        return response()->json($contents);
    }

    public function create(Request $request){
        $data = $request->all();
        if($request->file('user_foto')){
            $data['user_foto'] = Images::uploadImage($request->file('user_foto'));
        } else if(isset($data['user_foto'])){
            $data['user_foto'] = Images::uploadImage($data['user_foto']);
        }

        $data['user_state'] = 1;
        
        $content = Usuarios::create($data);
        
        return response()->json( $content);
    }

    public function update(Request $request,$id){
        $content = Usuarios::find($id);
        $data = $request->all(); 

        if($request->file('user_foto')){
            if($content->user_foto != ''){
                Storage::disk('public')->delete($content->user_foto);
            }
            $data['user_foto'] = Images::uploadImage($request->file('user_foto'));
        } else if(isset($data['user_foto'])){
            if($content->user_foto != ''){
                Storage::disk('public')->delete($content->user_foto);
            }
            $data['user_foto'] = Images::uploadImage($data['user_foto']);
        }       

        if(isset($data['user_password'])){
            $data['user_password'] =  Hash::make($data['user_password']);
        }
        $content->update($data);
        return response()->json( $content);
    }

    public function detail($id){
        $content = Usuarios::find($id);
        $content->thumbnail =  url('/')."".Images::ImageResize($content->user_foto,400);
        return response()->json( $content);
    }

    public function delete($id){
        $content = Usuarios::find($id);
        if($content->user_foto != ''){
            Storage::disk('public')->delete($content->user_foto);
        }
        $content->delete();
        return response()->json(["message"=>"Usuario Eliminado"]); 
    }

    public function guardarimageurl($imageUrl){
        // Obtener los datos de la imagen desde la URL
        $imageData = file_get_contents($imageUrl);
        // Guardar la imagen en el sistema de archivos de Laravel
        $filename = basename($imageUrl);
        Storage::disk('public')->put('images/' . $filename, $imageData);
    }

    public function getcategoriasunion($categoria){
        $categorias = [];
        $categorias[2970] = 2;
        $categorias[2975] = 1;
        $categorias[2977] = 3;
        $categorias[2973] = 4;
        $categorias[2985] = 5;
        $categorias[2972] = 6;
        $categorias[2978] = 7;
        $categorias[4573] = 8;
        if(isset($categorias[$categoria])){
            return $categorias[$categoria];
        } else {
            return 1;
        } 
    }

    public function setField(Request $request){
        $data = $request->all();
        $field = $data['field'];
        $value = $data['value'];
        $id = $data['product'];
        $product = Usuarios::find($id);
        $product->$field = $value;
        $product->save();
    }
}