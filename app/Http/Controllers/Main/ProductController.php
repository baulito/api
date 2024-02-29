<?php
namespace App\Http\Controllers\Main;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use App\Services\Images\Images;
use League\Csv\Reader;
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

    public function cargaMasiva(){
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
                echo "<pre>";
                print_r($record);
                echo "</pre>";
                echo "<br>";
                if(isset($record)){
                    $data = [];
                    $data['state'] = $record['21'] ;
                    $data['sku'] = $record[22] ;
                    $data['name'] = $record[1];
                    $data['description'] = $record[12];
                    $data['image_1'] = $record[2];
                    $data['image_2'] = $record[3];
                    $data['image_3'] = $record[4];
                    $data['image_4'] = $record[5];
                    $data['image_5'] = $record[6];
                    $data['image_6'] = $record[7];
                    $data['image_7'] = $record[8];
                    $data['image_8'] = $record[9];
                    $data['image_9'] = $record[10];
                    $data['product_status'] = 6;
                    $data['tags'] = $record[31];
                    $data['wheight'] = $record[40];
                    $data['height'] = 10;
                    $data['long'] = 10;
                    $data['width'] = 20;
                    $data['campus'] = 1;
                    $data['amount'] = $record[15];
                    $data['value'] = $record[13];
                    $this->guardarimageurl("https://togroow.com/images/".$record[2]);
                    $this->guardarimageurl("https://togroow.com/images/".$record[3]);
                    $this->guardarimageurl("https://togroow.com/images/".$record[4]);
                    $this->guardarimageurl("https://togroow.com/images/".$record[5]);
                    $this->guardarimageurl("https://togroow.com/images/".$record[6]);
                    $this->guardarimageurl("https://togroow.com/images/".$record[7]);
                    $this->guardarimageurl("https://togroow.com/images/".$record[8]);
                    $this->guardarimageurl("https://togroow.com/images/".$record[9]);
                    $this->guardarimageurl("https://togroow.com/images/".$record[10]);
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
        Storage::disk('public')->put('images/' . $filename, $imageData);
    }
}