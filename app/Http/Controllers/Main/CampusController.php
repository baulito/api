<?php
namespace App\Http\Controllers\Main;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Campus;
use Illuminate\Support\Facades\Storage;
use App\Services\Images\Images;
/**
 * @group  Categoria de productos
 */

class CampusController extends Controller
{

    public function list(Request $request){
        $data = $request->all();
        $contents = Campus::orderBy("order","ASC");
        if(isset($data['dispatch'])){
            $contents->where("dispatch",$data['dispatch']);
        }
        $contents = $contents->get();
        foreach ($contents as $key => $content) {
            $content->image_url =  url('/')."/images/".$content->image;
        }
        return response()->json($contents);
    }

    public function create(Request $request){
        $data = $request->all();
        if($request->file('image')){
            //$data['image'] = "entro por este lado";
            $data['image'] = Images::uploadImage($request->file('image'));
        } else if(isset($data['image'])){
            $data['image'] = Images::uploadImage($data['image']);
        }
        $order = Campus::max('order') + 1;
        $data['order'] = $order;
        if(!isset($data['dispatch'])){
            $data['dispatch'] = 0;
        }
        $content = Campus::create($data);
        
        return response()->json( $content);
    }

    public function update(Request $request,$id){
        $content = Campus::find($id);
        $data = $request->all();            
        if($request->file('image')){
            //$data['image'] = "entro por este lado";
            if($content->image != ''){
                Storage::disk('public')->delete($content->image);
            }
            $data['image'] = Images::uploadImage($request->file('image'));
        } else if(isset($data['image'])){
            if($content->image != ''){
                Storage::disk('public')->delete($content->image);
            }
            $data['image'] = Images::uploadImage($data['image']);
        }
        if(!isset($data['dispatch'])){
            $data['dispatch'] = 0;
        }
        $content->update($data);
        
        return response()->json( $content);
    }

    public function detail($id){
        $content = Campus::find($id);
        $content->image_url =  url('/')."/images/".$content->image;
        return response()->json( $content);
    }

    public function delete($id){
        $content = Campus::find($id);
        if ($content->image) {
            Storage::delete(public_path('/images/'.$content->image));
        }
        $content->delete();
        return response()->json(["message"=>"Categoria Eliminada"]); 
    }


    public function updateOrder(Request $request)
    {
        $orderId = $request->input('order_id');
        $currentOrder = $request->input('current_order');
        $direction = $request->input('direction');
        $content = Campus::find($orderId);
        if ($content) {
            $currentOrder = $content->order;
            $adjacentContent = null;
            if ($direction === 'up') {
                $adjacentContent = Campus::where('order', '<', $currentOrder)->orderBy('order', 'desc')->first();
            } else {
                $adjacentContent = Campus::where('order', '>', $currentOrder)->orderBy('order')->first();
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