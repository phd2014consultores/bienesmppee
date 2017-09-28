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
/*Route::get('incorporar',function(){


	
	return view('incorporar', compact('tipo_bien'), compact('forma_adquisicion'), compact('categoria'));
});*/

Route::get('/incorporar', 'IncorporarController@cargarBienes');
//Route::get('incorporar','AjaxController@obtenerSubcategoria');
Route::post('/obtenerSubcategoria','AjaxController@obtenerSubcategoria');
Route::post('/obtenerCategoriaEspecifica','AjaxController@obtenerCategoriaEspecifica');
Route::post('/incorporar','BienController@store');
Route::get('/asignar', 'AsignacionController@cargarBienes');
Route::post('/asignar','AsignacionController@actualizarBien');

Route::get('lapor1', ['as' => 'laporone','uses'=>'AsignacionController@lapor1']);
Route::get('lapor2', ['as' => 'laportwo','uses'=>'AsignacionController@lapor2']);
Route::get('lapor3', ['as' => 'laportree','uses'=>'AsignacionController@lapor3']);
Route::get('lapor4', ['as' => 'laportfour','uses'=>'AsignacionController@lapor4']);
Route::get('lapor5', ['as' => 'laportfive','uses'=>'AsignacionController@lapor5']);
Route::get('lapor6', ['as' => 'laportsix','uses'=>'AsignacionController@lapor6']);

Route::get('/reasignar', 'ReasignacionController@cargarBienes');
Route::post('/reasignar','ReasignacionController@actualizarBien');

Route::get('/desincorporar', 'DesincorporacionController@cargarBienes');
Route::post('/desincorporar','DesincorporacionController@actualizarBien');


Route::get('/tablero', 'TableroController@cargarBienes');

Route::get('archivos',function(){

	return view('archivos');
}); 

Route::post('/archivos','GeneradorArchivosController@datosBasicos');
Route::post('/archivos','GeneradorArchivosController@datosMaximaAutoridad');
Route::post('/archivos','GeneradorArchivosController@datosResponsablePatrimonial');

Route::get('proveedor','ProveedorController@cargarMensaje'); 
Route::post('/proveedor','ProveedorController@agregarProveedor');

Route::get('ente','EnteController@cargarMensaje'); 
Route::post('/ente','EnteController@agregarEnte');

Route::get('maxima_autoridad','Maxima_AutoridadController@cargarMensaje'); 
Route::post('/maxima_autoridad','Maxima_AutoridadController@agregarMaximaAutoridad');
