<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "category";
    protected $fillable = ['name', 'image', 'order','title'];
    protected $guarded = ['id'];
    public $timestamps = true;


    public static function formatCategory($category){
        $category->image_url =  url('/')."/images/".$category->image;
        return $category;
    }
}
