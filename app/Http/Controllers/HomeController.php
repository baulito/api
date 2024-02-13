<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * @group Hom de los servicios
 * clase que se llama al inicilizar la url del api
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
