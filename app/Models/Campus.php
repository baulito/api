<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
    protected $table = "campus";
    protected $fillable = ['name', 'country', 'city', 'address', 'additional', 'phone1', 'phone2', 'image', 'description', 'order','dispatch'];
    protected $guarded = ['id'];
    public $timestamps = true;
}
