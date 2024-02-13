<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',function () {
    echo "<h1>Api Togroow</h1>";
}); 
 Route::get('/lugares/paises', 'LugaresController@paises')->name('listadopaises2');   //OK
Route::get('/formimagen', 'PostController@formimage')->name('formimage');
Route::post('/cargarimagen', 'PostController@saveimage')->name('formsaveimage');

Route::fallback(function () {
    return response()->json(['mensaje' => 'Página o servicio no encontrado.'], 404);
});

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    //Artisan::call('view:cache');
    Artisan::call('route:clear');
    Artisan::call('route:cache');
    // Artisan::call('event:cache');
    //Artisan::call('event:clear');
    return "Cache is cleared";
});
Route::get('/passport-install', function () {
    Artisan::call('passport:install');
    return "pasport install";
});

Auth::routes();
