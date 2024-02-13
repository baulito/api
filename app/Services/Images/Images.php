<?php 
namespace App\Services\Images;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class Images{

    public static function uploadImage($uploadedFile){
        ini_set('memory_limit','560M');
        // Define el nuevo tamaño y peso deseado
        $width = 1200;
        $height = 1200;
        $quality = 70; // Valor de calidad para la compresión de la imagen (0 a 100)
        try {
            if(is_uploaded_file ( $uploadedFile) ){
                //echo "entro file";
                $name = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
                $extension =  $uploadedFile->getClientOriginalExtension();
                $fileName = self::fileExistName($name,$extension);
                //return $uploadedFile->getRealPath();
                $img = Image::make($uploadedFile->getRealPath())->orientate();
            } else if(is_array($uploadedFile)) {
                //echo "entro array";
                $name = pathinfo($uploadedFile['postname'], PATHINFO_FILENAME);
                $extension = pathinfo($uploadedFile['postname'], PATHINFO_EXTENSION);
                $fileName = self::fileExistName($name,$extension);
                $img = Image::make($uploadedFile['name'])->orientate();
        
            }

            $img->resize($width, $height, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $path = 'images/'.$fileName;
            // Guarda la imagen redimensionada en el sistema de archivos
            Storage::disk('public')->put($path, $img->encode(), 'public');
            return $fileName;
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public static function ImageResize($image,$whidth){
        $urlimage = public_path("/images/".$image);
        
        if (file_exists($urlimage) && is_dir($urlimage) == false ){
            $path = public_path('/images/imagesx'.$whidth);
            if(!File::exists($path)) File::makeDirectory($path, 777);
            $urlresize = '/images/imagesx'.$whidth."/".$image;
            $carpetas = explode("/",$image);
            if(count($carpetas) > 1){
                array_pop($carpetas);
                $newpad = $path;
                foreach ($carpetas as $key => $carpeta) {
                    $newpad = $newpad."/".$carpeta;
                    if(!File::exists($newpad)) File::makeDirectory($newpad, 777);
                }
            }
            if(file_exists(public_path($urlresize))){
                return $urlresize ;
            } else {
               $image = Image::make($urlimage)->orientate()->resize($whidth, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
                $image->save(public_path($urlresize)); 
                return $urlresize ;
            }
        } else{
            return '';
        }
    }

    private static function fileExistName($image,$extension){
        $imageName =  Str::slug(pathinfo($image, PATHINFO_FILENAME)). '.' . $extension;
        $path ='images/'.$imageName;
        // Verifica si la imagen ya existe
        $counter = 1;
        while ( Storage::disk('public')->exists($path)) {
            $imageName = pathinfo($path, PATHINFO_FILENAME) . '_' . $counter . '.' . $extension;
            $path = 'images/' . $imageName;
            $counter++;
        }
        return $imageName;
    }

    private  static  function generateFilename($filename)
    {
        // Si el archivo ya existe, cambia el nombre
        if (Storage::disk('images')->exists($filename)) {
            $extension = pathinfo($filename, PATHINFO_EXTENSION);
            $filename = pathinfo($filename, PATHINFO_FILENAME) . '_' . time() . '.' . $extension;
        }

        return $filename;
    }

}