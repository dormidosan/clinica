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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/listado', 'PacienteController@index')->name('listado.get');
Route::get('/creacion', 'PacienteController@creacion')->name('creacion.get');
Route::post('creacion', 'PacienteController@creacion_expediente')->name('creacion.post');

Route::get('/busqueda', 'PacienteController@busqueda')->name('busqueda.get');

Route::post('/busqueda', 'PacienteController@buscar_expedientes')->name('busqueda.post');

Route::post('/expediente', 'PacienteController@expediente')->name('expediente.post');




Route::post('/fotos', 'PacienteController@fotos')->name('fotos.post');

Route::group(['prefix' => 'fotos'], function () {
	Route::post('/upload', 'PacienteController@upload')->name('fotos.upload.post');
	Route::post('/save', 'PacienteController@save')->name('fotos.save.post');
});

Route::post('/controles', 'ControlController@controles')->name('controles.post');
Route::group(['prefix' => 'controles'], function () {
	
	Route::post('/save', 'ControlController@controles_save')->name('controles.save.post');
});


Route::post('/control', 'ControlController@control')->name('control.post');
Route::group(['prefix' => 'control'], function () {
	
	Route::post('/save', 'ControlController@control_save')->name('control.save.post');
});


Route::post('/pagos', 'PagoController@pagos')->name('pagos.post');