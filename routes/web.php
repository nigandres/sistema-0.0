<?php

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

Route::get('/mail','HomeController@send');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home', 'HomeController@resultados')->name("home");
Route::resource('/libros','LibrosController');

Route::resource('/area','AreaController');
Route::resource('/libro','LibroController');
Route::resource('/categoria','CategoriaController');
Route::resource('/editorial','EditorialController');
Route::resource('/autor','AutorController');
Route::resource('/lenguaje','LenguajeController')->middleware('auth');
Route::post('/lenguaje/obtener','LenguajeController@getAll')->middleware('auth');

Route::get('/file-upload','RespaldosController@guardar');
Route::get('/respaldos/cargar','RespaldosController@cargar');
Route::post('/file-upload','RespaldosController@save');
