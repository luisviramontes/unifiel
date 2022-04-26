<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
 

Route::get('welcome','lobyController@index');
// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', ['as' =>'auth/login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('auth/logout', ['as' => 'auth/logout', 'uses' => 'Auth\AuthController@getLogout']);

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', ['as' => 'auth/register', 'uses' => 'Auth\AuthController@postRegister']);

//documentacion y registro de usuario
Route::resource('documentacion', 'documentacionUsuariosController');

//firma electronica 
Route::resource('firma_electronica', 'firmaElectronicaController');
Route::get('autofirmado','firmaElectronicaController@autofirmado');

//autoridades_certificadoras
Route::resource('autoridades_certificadoras', 'autoridadesCertController');
Route::get('validar_autoridad/{id}','autoridadesCertController@validar_autoridad');

//pruebas openssl
Route::get('priv_pub', 'pruebasController@priv_pub');
Route::post('generar_claves', 'pruebasController@generar_claves');
Route::get('crear_claves_priv_pub', 'pruebasController@crear_claves_priv_pub');
Route::get('encriptar_msj', 'pruebasController@encriptar_msj');
Route::post('cifrar_msj', 'pruebasController@cifrar_msj');
