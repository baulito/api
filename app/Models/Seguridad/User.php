<?php

namespace App\Models\Seguridad;

//use App\Models\Admin\Rol;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
//use Tymon\JWTAuth\Contracts\JWTSubject;
//use Session;

class User extends Authenticatable  //implements JWTSubject
{
     use HasApiTokens, Notifiable;

    protected $remember_token = true;
    protected $table = "user";
    protected $fillable = ['user_names', 'user_lastnames', 'user_email', 'user_typeid', 'user_idnumber', 'user_city', 'user_phone', 'user_address', 'user_level', 'user_state', 'user_user', 'user_password', 'user_delete', 'user_code', 'user_informacion', 'user_foto'];
    public $timestamps = true;
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['user_password, user_remember_token'];

    protected $rememberTokenName = 'user_remember_token';

    protected $primaryKey = 'user_id';

    protected $guarded = ['user_id'];

    const CREATED_AT = 'user_fecha_creacion';
    const UPDATED_AT = 'user_fecha_modificacion';


    public function username()
    {
        return 'user_email';
    }

    public function getAuthPassword()
    {
      return $this->user_password;
    }

    public function getAuthIdentifierName()
    {
        return 'user_id';
    }

    public function getAuthIdentifier()
    {
        return $this->user_id;
    }

    public function getRememberToken(){
        return $this->getRememberTokenName();
    }

    public function setRememberToken($value){
        $this->rememberTokenName = $value;
    }

    public function getRememberTokenName(){
        return $this->rememberTokenName;
    }

    function findForPassport($username) {
        return $this->where('username', $username)->first();
   }

    public function getEmailAttribute() {
        return $this->attributes['user_email'];
    }

    public function setEmailAttribute($value) {
        $this->attributes['user_email'] = $value;
    }
}
