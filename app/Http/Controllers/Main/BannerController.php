<?php
namespace App\Http\Controllers\Main;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Support\Facades\Storage;
use App\Services\Images\Images;
/**
 * @group  Categoria de productos
 */

class BannerController extends Controller
{

    public function list(){
        $banners = Banner::orderBy("order","ASC")->get();
        foreach ($banners as $key => $banner) {
            $banner->image_url =  url('/')."/images/".$banner->image;
        }
        return response()->json($banners);
    }

    public function create(Request $request){
        $data = $request->all();
        if($request->file('image')){
            //$data['image'] = "entro por este lado";
            $data['image'] = Images::uploadImage($request->file('image'));
        } else if(isset($data['image'])){
            $data['image'] = Images::uploadImage($data['image']);
        }
        $order = Banner::max('order') + 1;
        $data['order'] = $order;
        
        $banner = Banner::create($data);
        
        return response()->json( $banner);
    }

    public function update(Request $request,$id){
        $banner = Banner::find($id);
        $data = $request->all();            
        if($request->file('image')){
            //$data['image'] = "entro por este lado";
            if($banner->image != ''){
                Storage::disk('public')->delete($banner->image);
            }
            $data['image'] = Images::uploadImage($request->file('image'));
        } else if(isset($data['image'])){
            if($banner->image != ''){
                Storage::disk('public')->delete($banner->image);
            }
            $data['image'] = Images::uploadImage($data['image']);
        }
        $banner->update($data);
        
        return response()->json( $banner);
    }

    public function detail($id){
        $banner = Banner::find($id);
        $banner->image_url =  url('/')."/images/".$banner->image;
        return response()->json( $banner);
    }

    public function delete($id){
        $banner = Banner::find($id);
        if ($banner->image) {
            Storage::delete(public_path('/images/'.$banner->image));
        }
        $banner->delete();
        return response()->json(["message"=>"Banner Eliminado"]); 
    }


    public function updateOrder(Request $request)
    {
        $orderId = $request->input('order_id');
        $currentOrder = $request->input('current_order');
        $direction = $request->input('direction');
        $content = Banner::find($orderId);
        if ($content) {
            $currentOrder = $content->order;
            $adjacentContent = null;
            if ($direction === 'up') {
                $adjacentContent = Banner::where('order', '<', $currentOrder)->orderBy('order', 'desc')->first();
            } else {
                $adjacentContent = Banner::where('order', '>', $currentOrder)->orderBy('order')->first();
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