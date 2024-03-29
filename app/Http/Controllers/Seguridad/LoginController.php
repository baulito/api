<?php

namespace App\Http\Controllers\Seguridad;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = '/sistema';
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index(){
        //return view('seguridad.index');
    }

    public function username()
    {
        return 'user_user';
    }

    protected function authenticated(Request $request, $user)
    {
        
    }

}
