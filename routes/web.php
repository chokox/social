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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//RUTAS DEL MODULO DE MUNICIPIOS
Route::resource('/comites', 'App\Http\Controllers\ComitesController');
Route::get('/registrar_comite/{id}', 'App\Http\Controllers\ComitesController@crearComite')->name('crearComite');
Route::put('/subir_documentacion/{id}', 'App\Http\Controllers\ComitesController@subirDocumentacion')->name('CSubirDoc');
Route::delete('/eliminar_documentacion/{id}', 'App\Http\Controllers\ComitesController@eliminarDocumentacion')->name('CEliminarDoc');
Route::resource('/comites', 'App\Http\Controllers\ComitesController');
Route::resource('/integrantes', 'App\Http\Controllers\IntegrantesComiteController');
Route::resource('/catalogo_municipios', 'App\Http\Controllers\MunicipioController');
//FIN DE RUTAS DEL MODULO DE MUNICIPIOS

//RUTAS DEL MODULO DE USUARIOS
Route::resource('/catalogo_usuarios', 'App\Http\Controllers\UserController');