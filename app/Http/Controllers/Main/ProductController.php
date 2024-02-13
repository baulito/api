<?php
namespace App\Http\Controllers\Main;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use App\Services\Images\Images;
/**
 * @group  Categoria de productos
 */

class ProductController extends Controller
{

    public function list(Request $request){
        $data = $request->all();
        $contents = Product::orderBy("created_at","DESC");
        if(isset($data['search'])){
            $contents = Product::search($data['search']);
        } else {
            $contents = Product::orderBy("created_at","DESC");
        }
        $contents = $contents->get();
        foreach ($contents as $key => $content) {
            $content->thumbnail =  url('/')."".Images::ImageResize($content->image_1,200);
        }
        return response()->json($contents);
    }

    public function create(Request $request){
        $data = $request->all();

        for ($i=1; $i <10 ; $i++) { 
            $nameimage = 'image_'.$i;
            if($request->file($nameimage)){
                $data[$nameimage] = Images::uploadImage($request->file($nameimage));
            } else if(isset($data[$nameimage])){
                $data[$nameimage] = Images::uploadImage($data[$nameimage]);
            }
        }
        if(!isset($data['status'])){
            $data['status'] = 0;
        }
        $content = Product::create($data);
        
        return response()->json( $content);
    }

    public function update(Request $request,$id){
        $content = Product::find($id);
        $data = $request->all(); 
        for ($i=1; $i <10 ; $i++) { 
            $nameimage = 'image_'.$i;
            if($request->file($nameimage)){
                if($content->image != ''){
                    Storage::disk('public')->delete($content->$nameimage);
                }
                $data[$nameimage] = Images::uploadImage($request->file($nameimage));
            } else if(isset($data[$nameimage])){
                if($content->image != ''){
                    Storage::disk('public')->delete($content->$nameimage);
                }
                $data[$nameimage] = Images::uploadImage($data[$nameimage]);
            }
        }
        if(!isset($data['status'])){
            $data['status'] = 0;
        }          
        $content->update($data);
        return response()->json( $content);
    }

    public function detail($id){
        $content = Product::find($id);
        for ($i=1; $i <10 ; $i++) { 
            $nameimageurl = 'image_url_'.$i;
            $nameimage = 'image_'.$i;
            $content->$nameimageurl =  url('/')."/images/".$content->$nameimage;
        }
        return response()->json( $content);
    }

    public function delete($id){
        $content = Product::find($id);
        for ($i=1; $i <10 ; $i++) { 
            $nameimage = 'image_'.$i;
            Storage::delete(public_path('/images/'.$content->$nameimage));
        }
        $content->delete();
        return response()->json(["message"=>"Categoria Eliminada"]); 
    }
}