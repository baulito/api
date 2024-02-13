<?php
namespace App\Http\Controllers\Main;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use App\Services\Images\Images;
/**
 * @group  Categoria de productos
 */

class CategoryController extends Controller
{

    public function list(){
        $categories = Category::orderBy("order","ASC")->get();
        foreach ($categories as $key => $category) {
            $category->image_url =  url('/')."/images/".$category->image;
        }
        return response()->json($categories);
    }

    public function create(Request $request){
        $data = $request->all();
        if($request->file('image')){
            //$data['image'] = "entro por este lado";
            $data['image'] = Images::uploadImage($request->file('image'));
        } else if(isset($data['image'])){
            $data['image'] = Images::uploadImage($data['image']);
        }
        $order = Category::max('order') + 1;
        $data['order'] = $order;
        
        $category = Category::create($data);
        
        return response()->json( $category);
    }

    public function update(Request $request,$id){
        $category = Category::find($id);
        $data = $request->all();            
        if($request->file('image')){
            //$data['image'] = "entro por este lado";
            if($category->image != ''){
                Storage::disk('public')->delete($category->image);
            }
            $data['image'] = Images::uploadImage($request->file('image'));
        } else if(isset($data['image'])){
            if($category->image != ''){
                Storage::disk('public')->delete($category->image);
            }
            $data['image'] = Images::uploadImage($data['image']);
        }
        $category->update($data);
        
        return response()->json( $category);
    }

    public function detail($id){
        $category = Category::find($id);
        $category->image_url =  url('/')."/images/".$category->image;
        return response()->json( $category);
    }

    public function delete($id){
        $category = Category::find($id);
        if ($category->image) {
            Storage::delete(public_path('/images/'.$category->image));
        }
        $category->delete();
        return response()->json(["message"=>"Categoria Eliminada"]); 
    }


    public function updateOrder(Request $request)
    {
        $orderId = $request->input('order_id');
        $currentOrder = $request->input('current_order');
        $direction = $request->input('direction');
        $content = Category::find($orderId);
        if ($content) {
            $currentOrder = $content->order;
            $adjacentContent = null;
            if ($direction === 'up') {
                $adjacentContent = Category::where('order', '<', $currentOrder)->orderBy('order', 'desc')->first();
            } else {
                $adjacentContent = Category::where('order', '>', $currentOrder)->orderBy('order')->first();
            }
            if ($adjacentContent) {
                // Intercambia los valores de order entre los dos registros
                $tempOrder = $content->order;
                $content->update(['order' => $adjacentContent->order]);
                $adjacentContent->update(['order' => $tempOrder]);

                return response()->json(['success' => true, 'message' => 'Orden actualizado correctamente.']);
            } else {
                return response()->json(['success' => false, 'error' => 'No se encontró el contenido adyacente.']);
            }
        } else {
            return response()->json(['success' => false, 'error' => 'Contenido no encontrado.']);
        }
    }


}