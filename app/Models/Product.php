<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use Searchable;
    protected $table = "product";
    protected $fillable = ['state', 'sku', 'name', 'category', 'description', 'image_1', 'image_2', 'image_3', 'image_4', 'image_5', 'image_6', 'image_7', 'image_8', 'image_9', 'tags', 'product_status', 'wheight', 'height', 'long', 'width', 'campus', 'amount', 'value', 'old_value'];
    protected $guarded = ['id'];
    public $timestamps = true;
}
