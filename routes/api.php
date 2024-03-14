<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'cors'], function () {
    Route::any('/usuarios/login', 'UserController@login')->name('login_user');
    Route::post('/usuarios/signup', 'UserController@signup')->name('signup');
    Route::post('/usuarios/register', 'UserController@register')->name('register_user');
    Route::any('/usuarios/restorepassword', 'UserController@restorepassword')->name('restorepassworduser');
    Route::any('/usuarios/changepassword', 'UserController@changepassword')->name('changepassworduser');
    
    // LUGARES
    Route::get('/lugares/paises', 'LugaresController@paises')->name('listadopaises');   //OK
    Route::get('/lugares/paises/{pais}/ciudades', 'LugaresController@ciudades')->name('listadociudades');  // OK
    Route::get('/lugares/ciudades/{ciudad}/zonas', 'LugaresController@zonas')->name('listadozonas');  // OK
    /*
    Route::get('/togroow/productos', 'Togroow\ProductosController@listado')->name('listado_productos');
    Route::get('/togroow/products/search', 'Togroow\ProductoController@search')->name('listado_productos2');
    Route::get('/togroow/products/category', 'Togroow\ProductoController@getCategoriasNegocio')->name('listado_getCategoriasNegocio');
    Route::get('/togroow/products/scout/import', 'Togroow\ProductosController@cargaScout')->name('scout_productos');
    //Route::get('/togroow/productos/detail/{id}', 'Togroow\ProductosController@detailProduct')->name('detail_product');
    Route::get('/togroow/productos/detail/{id}', 'Togroow\ProductoController@detail')->name('detail_product');
    Route::get('/togroow/pruebas/ventas/', 'Togroow\VentasController@listado2')->name('listado_ventas2');
    Route::get('/negocios/banners/{id}', 'NegociosController@banners')->name('negocio_banners');*/

    Route::any('/store/pay', 'Togroow\ComprarController@comprar')->name('comprar_productos');
    Route::any('/envio/ciudades', 'Togroow\EnvioController@ciudades')->name('ciudades_envio');
    Route::any('/envio/ciudadesrename', 'Togroow\EnvioController@namedirecciones')->name('namedirecciones_envio');
    Route::any('/compra/detallecompra/{id}', 'Togroow\ComprarController@detallecompra')->name('detallecompra_compra');
    Route::any('/compra/notificar/{id}', 'Togroow\ComprarController@notificarcompra')->name('notificarcompra_compra');
    Route::any('/store/products/categories', 'Togroow\CategoriasstoreController@Categorias')->name('ctegorias_store');
    Route::any('/store/products/xml', 'Togroow\ProductoController@xml')->name('xml_products');
    Route::any('/store/products/save','Togroow\ProductoController@saveProduct')->name('save_product');


    Route::any('/mercadopago/getpublickey','Mercadopago\MercadopagoController@getPublickey')->name('getpublickey_mercadopago');
    Route::any('/mercadopago/pagopse','Mercadopago\MercadopagoController@pagopse')->name('pagopse_mercadopago');
    Route::any('/mercadopago/pagopsefinal','Mercadopago\MercadopagoController@pagopsefinal')->name('pagopsefinal_mercadopago');
    Route::any('/mercadopago/webhook','Mercadopago\MercadopagoController@webhook')->name('webhook_mercadopago');
    Route::any('/mercadopago/cronjob','Mercadopago\MercadopagoController@actualizar')->name('cronjob_mercadopago');
    Route::any('/mercadopago/autorizar','Mercadopago\MercadopagoController@vincularMercadopago')->name('vincularMercadopago_mercadopago');
    Route::any('/mercadopago/authorization','Mercadopago\MercadopagoController@authorization')->name('authorization_mercadopago');
    Route::any('/mercadopago/getreportes','Mercadopago\MercadopagoController@getreportes')->name('getreportes_mercadopago');
    Route::any('/compra/checkoutpagar', 'Togroow\ComprarController@checkoutpagar')->name('checkoutpagar_compra');
    Route::any('/mercadopago/validarpago','Mercadopago\MercadopagoController@validarpago')->name('validarpago_mercadopago');

    Route::any('/mercadopago/notificar','Mercadopago\MercadopagoController@notificar')->name('notificar_compra_mercadopago');

    Route::any('/mercadopago/res','Mercadopago\MercadopagoController@res')->name('res_mercadopago');
    Route::any('/mercadopago/failure','Mercadopago\MercadopagoController@res')->name('res2_mercadopago');
    Route::any('/mercadopago/notification','Mercadopago\MercadopagoController@notification')->name('notification_mercadopago');
    Route::any('/mercadopago/informacionpago','Mercadopago\MercadopagoController@informacionpago')->name('informacionpago_mercadopago');

    Route::any('/ventas/actualizarbaulito','Togroow\VentasController@actualizarbaulito')->name('actualizarbaulito_ventas');

    Route::get('/categories', 'Main\CategoryController@list')->name('list_categories');
    Route::get('/categories/detail/{id}', 'Main\CategoryController@detail')->name('detail_categories');
    Route::get('/campus', 'Main\CampusController@list')->name('list_campus');
    Route::get('/campus/detail/{id}', 'Main\CampusController@detail')->name('detail_campus');
    Route::get('/product', 'Main\ProductController@list')->name('list_product');
    Route::get('/product/detail/{id}', 'Main\ProductController@detail')->name('detail_product');
    Route::get('/product/carga', 'Main\ProductController@cargaMasiva')->name('carga_product');
    Route::post('/product/setfield', 'Main\ProductController@setField')->name('setfield_product');
});

Route::group(['middleware' => 'cors', 'middleware' => 'auth:api'], function () {

    Route::get('/chat/products', 'Togroow\ProductoController@searchchat')->name('listado_productos_chat');

    // USUARIOS
    Route::post('/usuarios/logout', 'UserController@logout')->name('logoutuser');
    Route::post('/usuarios/refresh', 'UserController@refresh')->name('refreshhuser');
    Route::get('/usuarios/{id}/detail', 'UserController@detalle')->name('detalleusuario');
    Route::get('/usuarios/all', 'UserController@listado')->name('listadousuario');
    Route::get('/usuarios/listado2', 'UserController@listado2')->name('listadousuario2');
    Route::post('/usuarios/{user_id}/avatar', 'UserController@updateUserAvatarImage')->name('avatarusuario');
    Route::post('/usuarios/{user_id}/background', 'UserController@updateUserBackImage')->name('fondousuario');
    Route::get('/usuarios/me', 'UserController@me')->name('me');
    Route::put('/usuarios/{user_id}/password', 'UserController@updateUserPassword')->name('updatepassword');
    Route::put('/usuarios/{user_id}/editar', 'UserController@editar')->name('usereditar');
    Route::put('/usuarios/edit', 'UserController@edit')->name('useredit');
    Route::put('/usuarios/updatepassword', 'UserController@updatepassword')->name('userupdatepassword');
    Route::get('/usuarios/miscompras', 'Togroow\ComprarController@miscompras')->name('miscompras');

    
    // /gente/amigos
    // /sportodos/usuarios/{user_id}/amigos // permisos solo para mi  o mis amigos


    //notificaciones
    Route::get('/notificaciones/usuario/{user_id}', 'NotificacionesController@index')->name('listadonotificaciones');
    Route::put('/notificaciones/{id}/update', 'NotificacionesController@editar')->name('editarnotificaciones');
    Route::delete('/notificaciones/{id}/delete', 'NotificacionesController@eliminar')->name('deletenotificaciones');
    

    
    // NEGOCIOS
    Route::get('/negocios/categorias/all', 'CategorianegocioController@listado')->name('listadocategoriasnegocio');
    Route::get('/negocios/all', 'NegociosController@index')->name('listadonegocios');
    Route::get('/negocios/{id}/detail', 'NegociosController@detalle')->name('detallenegocios');

    Route::get('/togroow/ventas/', 'Togroow\VentasController@listado')->name('listado_ventas');

    Route::any('/compra/validar', 'Togroow\ComprarController@validar')->name('validar_compra');
    Route::any('/envio/changeprincipal/{id}', 'Togroow\EnvioController@principalChange')->name('principalchanges_address');
    Route::any('/envio/new', 'Togroow\EnvioController@new')->name('new_address');
    Route::post('/envio/update', 'Togroow\EnvioController@update')->name('update_address');
    Route::delete('/envio/delete/{id}', 'Togroow\EnvioController@delete')->name('delete_address');


    /*categorias*/
    
    Route::post('/categories/create', 'Main\CategoryController@create')->name('create_categories');
    Route::put('/categories/update/{id}', 'Main\CategoryController@update')->name('update_categories');
    Route::delete('/categories/delete/{id}', 'Main\CategoryController@delete')->name('delete_categories');
    Route::post('/categories/updateorder', 'Main\CategoryController@updateOrder')->name('updateorder_categories');
     

    /*campus*/
    Route::get('/campus', 'Main\CampusController@list')->name('list_campus');
    Route::get('/campus/detail/{id}', 'Main\CampusController@detail')->name('detail_campus');
    Route::post('/campus/create', 'Main\CampusController@create')->name('create_campus');
    Route::put('/campus/update/{id}', 'Main\CampusController@update')->name('update_campus');
    Route::delete('/campus/delete/{id}', 'Main\CampusController@delete')->name('delete_campus');
    Route::post('/campus/updateorder', 'Main\CampusController@updateOrder')->name('updateorder_campus');
     
    /*campus*/
    

    Route::post('/product/create', 'Main\ProductController@create')->name('create_product');
    Route::put('/product/update/{id}', 'Main\ProductController@update')->name('update_product');
    Route::delete('/product/delete/{id}', 'Main\ProductController@delete')->name('delete_product');
     
     
});
