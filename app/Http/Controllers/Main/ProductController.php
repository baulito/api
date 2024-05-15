<?php
namespace App\Http\Controllers\Main;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use App\Services\Images\Images;
use League\Csv\Reader;
use PhpParser\Node\Stmt\Return_;

/**
 * @group  Categoria de productos
 */

class ProductController extends Controller
{

    public function list(Request $request){
        $data = $request->all();
        if(isset($data['search'])){
            $contents = Product::search($data['search']);
        } else {
            $contents = Product::orderBy("created_at","DESC");
        }

        if(isset($data['category'])){
            $contents->where("category",$data['category']);
        }

        if(isset($data['out']) && $data['out'] == 2 ){
            $contents->where("state",'0')->where("amount","<",'1');
        } else if(isset($data['out'])) {
            $contents->where("state",'1');
            if(!isset($data['search'])){
                $contents->where("amount",">",'1');
            }
        }
       
        
        $paginate = 40;
        if(isset($data['paginate'])){
            $paginate = $data['paginate'];
        }
        $contents = $contents->paginate($paginate);
        foreach ($contents as $key => $content) {
            $content = Product::formatProduct($content);
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
        if(!isset($data['state'])){
            $data['state'] = 0;
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
        if(!isset($data['state'])){
            $data['state'] = 0;
        }          
        $content->update($data);
        return response()->json( $content);
    }

    public function detail($id){
        $content = Product::find($id);
        $content = Product::formatProduct($content);
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

    public function cargaMasiva(){
        set_time_limit(10000);
        $filePath = public_path('productos.csv'); 
        /*if (!Storage::exists($filePath)) {
            return response()->json(['error' => 'El archivo no existe'], 404);
        }*/

        $csv = Reader::createFromPath($filePath, 'r');
        $csv->setDelimiter(';');
        // Lee los registros del archivo CSV
        $records = $csv->getRecords();
        // Procesa los registros como desees
        foreach ($records as $key => $record) {
            if($key > 0){
                // $record es un array que contiene los valores de cada fila del CSV
                // Haz lo que necesites con los valores
                /*echo "<pre>";
                print_r($record);
                echo "</pre>";
                echo "<br>";*/
                if(isset($record) && isset($record[2]) && $record[2] !='NULL' && $record[2] !=''){
                    $data = [];
                    if(isset($record['21']) && $record['21']>= 0){
                        $data['state'] = $record['21'] ;
                    } else {
                        $data['state'] = 0;
                    }
                    $data['sku'] = $record[22] ;
                    $data['name'] = $record[1];
                    $data['description'] = $record[12];
                    for ($i=1; $i <9 ; $i++) { 
                        if( $record[$i+1] != '' && $record[$i+1] !='NULL'){
                            $data['image_'.$i] = $record[$i+1];
                        }
                    }
                    $data['product_status'] = 6;
                    $data['tags'] = $record[31];
                    $data['wheight'] = $record[40];
                    $data['height'] = 10;
                    $data['long'] = 10;
                    $data['width'] = 20;
                    $data['campus'] = 1;
                    $data['amount'] = $record[15];
                    $data['value'] = $record[13];
                    $data['category'] = $this->getcategoriasunion($record[19]);
                    for ($i=2; $i < 11; $i++) { 
                        if( $record[$i] != '' && $record[$i] != 'NULL' ){
                            $this->guardarimageurl("https://togroow.com/images/".$record[$i]);
                        }
                    }
                    /*cho "<pre>";
                    print_r($data);
                    echo "</pre>";*/
                    Product::create($data);
                }
            }
        }

    }

    public function guardarimageurl($imageUrl){
        // Obtener los datos de la imagen desde la URL
        $imageData = file_get_contents($imageUrl);
        // Guardar la imagen en el sistema de archivos de Laravel
        $filename = basename($imageUrl);
        if(!Storage::disk('public')->exists('images/' . $filename)){
            Storage::disk('public')->put('images/' . $filename, $imageData);
        }
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
        $product = Product::find($id);
        $product->$field = $value;
        $product->save();
    }
}