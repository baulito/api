<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Usuarios extends Model
{
    use Searchable;
    protected $table = "user";
    protected $fillable = ['user_names', 'user_lastnames', 'user_email', 'user_typeid', 'user_idnumber', 'user_city', 'user_country', 'user_phone', 'user_address', 'user_level', 'user_state', 'user_user', 'user_password', 'user_delete', 'user_code', 'user_informacion', 'user_foto'];
    protected $guarded = ['user_id'];
    protected $primaryKey = 'user_id';
    public $timestamps = true;
}
