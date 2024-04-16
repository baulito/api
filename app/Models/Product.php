<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use App\Models\Category;
use App\Models\Campus;
use App\Services\Images\Images;

class Product extends Model
{
    use Searchable;
    protected $table = "product";
    protected $fillable = ['state', 'sku', 'name', 'category', 'description', 'image_1', 'image_2', 'image_3', 'image_4', 'image_5', 'image_6', 'image_7', 'image_8', 'image_9', 'tags', 'product_status', 'wheight', 'height', 'long', 'width', 'campus', 'amount', 'value', 'old_value'];
    protected $guarded = ['id'];
    public $timestamps = true;

    public function categoria(){

        return Category::find($this->category);
    }

    public function campusdetail(){
        return Campus::find($this->campus);
    }

    public static function formatProduct($product){
        $status  = self::getStatus();
        if(isset($product->image_1) && file_exists(public_path("/images/".$product->image_1))){
            $product->thumbnail =  url('/')."".Images::ImageResize($product->image_1,200);
        }
        for ($i=1; $i <10 ; $i++) { 
            $nameimage = 'image_'.$i;
            if(isset($product->$nameimage) && $product->$nameimage != '' && $product->$nameimage != 'NULL'){
                $product->$nameimage =  url('/')."/images/".$product->$nameimage;
            } else {
                $product->$nameimage = '';
            }
        }
        $product->categorydetail = $product->categoria();
        $product->campusdetail = $product->campusdetail();
        $product->productstatus =   $status[$product->product_status];
        return $product;
    }

    public function getStatus(){
        $array = [];
        $array['1'] = "Nuevo con empaque";
        $array['2'] = "Nuevo sin empaque";
        $array['3'] = "Nuevo con etiqueta";
        $array['4'] = "Nuevo sin etiqueta";
        $array['5'] = "Nuevo con defectos";
        $array['6'] = "Usado";
        $array['7'] = "Usado con etiqueta";
        $array['8'] = "Usado una postura";
        $array['9'] = "Usado con defectos";
        return $array;
    }
}
