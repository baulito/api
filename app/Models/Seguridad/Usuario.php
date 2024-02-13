<?php

namespace App\Models\Seguridad;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Admin\Rol;
use Session;


class Usuario extends Authenticatable
{
    protected $remember_token = false;
    protected $table = "user";
    protected $fillable = ['user_user', 'user_email', 'user_password'];
    protected $guarded = ['id'];

    public function getAuthPassword()
    {
      return "user_password";
    }

    public function username()
    {
        return 'user_user';
    }
}
