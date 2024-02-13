<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Image;

trait UploadTrait
{
    public static function uploadImageOne($uploadedFile)
    {
        if(is_uploaded_file ( $uploadedFile) ){
            $name = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
            $extension =  $uploadedFile->getClientOriginalExtension();
            $fileName = UploadTrait::formatName($name,$extension,'images');

            $img = Image::make($uploadedFile->getRealPath());
            $img->resize(1200,1200, function ($constraint) {
                $constraint->aspectRatio();                 
            });
            $img->stream(); // <-- Key point
            Storage::disk('local')->put($fileName, $img, 'public');
            return $fileName;
        } else if(is_array($uploadedFile)) {
            $name = pathinfo($uploadedFile['postname'], PATHINFO_FILENAME);;
            $extension = pathinfo($uploadedFile['postname'], PATHINFO_EXTENSION);
            $fileName = UploadTrait::formatName($name,$extension,'images');
            $img = Image::make($uploadedFile['name']);
            $img->resize(1200,1200, function ($constraint) {
                $constraint->aspectRatio();                 
            });
            $img->stream(); // <-- Key point
            Storage::disk('local')->put($fileName, $img, 'public');
            return $fileName;
        }
    }
    

    public static function formatName($name,$extension,$folder,$position = 0){
        if($position == 0){
            $route = public_path().'/'.$folder.'/'.$name.'.'.$extension;
            $filename = $name.'.'.$extension;
        } else {
            $route = public_path().'/'.$folder.'/'.$name.'_'.$position.'.'.$extension;
            $filename = $name.'_'.$position.'.'.$extension;
        }
        if(file_exists($route)){
            return UploadTrait::formatName($name,$extension,$folder,($position+1));
        } else {
            return $filename;
        }

    }
}