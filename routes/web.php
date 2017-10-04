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

Route::get('/incorporar', 'BienController@create');
Route::get('/asignar', 'AsignacionController@create');
Route::get('/reasignar', 'ReasignacionController@create');
Route::get('/desincorporar', 'DesincorporacionController@create');
Route::get('/tablero', 'TableroController@index');
Route::get('/archivos',function(){return view('archivos');});

Route::post('/obtenerSubcategoria','AjaxController@obtenerSubcategoria');
Route::post('/obtenerCategoriaEspecifica','AjaxController@obtenerCategoriaEspecifica');
Route::post('/incorporar','BienController@store');
Route::post('/asignar','AsignacionController@store');
Route::post('/reasignar','ReasignacionController@store');
Route::post('/desincorporar','DesincorporacionController@store');

Route::post('/archivos/datos_basicos', ['as' => '/archivos', 'uses' => 'GeneradorArchivosController@datosBasicos']);
Route::post('/archivos/maxima_autoridad', ['as' => '/archivos', 'uses' => 'GeneradorArchivosController@datosMaximaAutoridad']);
Route::post('/archivos/responsable_patrimonial',['as' => '/archivos', 'uses' => 'GeneradorArchivosController@datosResponsablePatrimonial']);
Route::post('/archivos/datos_sede',['as' => '/archivos', 'uses' => 'GeneradorArchivosController@datosSede']);

Route::get('/proveedor','ProveedorController@create');
Route::post('/proveedor','ProveedorController@store');
Route::post('/obtenerProveedor','AjaxController@obtenerProveedor');

Route::get('/ente','EnteController@create');
Route::post('/ente','EnteController@store');
Route::post('/obtenerEnte','AjaxController@obtenerEnte');

Route::get('/maxima_autoridad','Maxima_AutoridadController@create');
Route::post('/maxima_autoridad','Maxima_AutoridadController@store');
Route::post('/obtenerMaximaAutoridad','AjaxController@obtenerMaximaAutoridad');

Route::get('/responsable_patrimonial','Responsable_PatrimonialController@create');
Route::post('/responsable_patrimonial','Responsable_PatrimonialController@store');
Route::post('/obtenerResponsablePatrimonial','AjaxController@obtenerMaximaAutoridad');

Route::get('/sede','SedeController@create');
Route::post('/sede','SedeController@store');
Route::post('/obtenerSede','AjaxController@obtenerSede');

Route::get('/unidad_administrativa','UnidadAdministrativaController@create');
Route::post('/unidad_administrativa','UnidadAdministrativaController@store');
Route::post('/obtenerUnidadAdministrativa','AjaxController@obtenerUnidadAdministrativa');

Route::get('/marca','MarcaController@create');
Route::post('/marca','MarcaController@store');
Route::post('/obtenerMarca','AjaxController@obtenerMarca');

Route::get('/modelo','ModeloController@create');
Route::post('/modelo','ModeloController@store');
Route::post('/obtenerModelo','AjaxController@obtenerModelo');

Route::get('/estado','EstadoController@create');
Route::post('/estado','EstadoController@store');
Route::post('/obtenerEstado','AjaxController@obtenerEstado');

Route::get('/municipio','MunicipioController@create');
Route::post('/municipio','MunicipioController@store');
Route::post('/obtenerMunicipio','AjaxController@obtenerMunicipio');

Route::get('/pais','PaisController@create');
Route::post('/pais','PaisController@store');
Route::post('/obtenerPais','AjaxController@obtenerPais');

Route::get('/parroquia','ParroquiaController@create');
Route::post('/parroquia','ParroquiaController@store');
Route::post('/obtenerParroquia','AjaxController@obtenerParroquia');

Route::get('/ciudad','CiudadController@create');
Route::post('/ciudad','CiudadController@store');

Route::get('/categoria','CategoriaController@create');
Route::post('/categoria','CategoriaController@store');

Route::get('/subcategoria','SubcategoriaController@create');
Route::post('/subcategoria','SubcategoriaController@store');

Route::get('/categoria_especifica','CategoriaEspecificaController@create');
Route::post('/categoria_especifica','CategoriaEspecificaController@store');

Route::get('/color','ColorController@create');
Route::post('/color','ColorController@store');

Route::get('/unidad_medida','UnidadMedidaController@create');
Route::post('/unidad_medida','UnidadMedidaController@store');

Route::get('/estado_bien','EstadoBienController@create');
Route::post('/estado_bien','EstadoBienController@store');

Route::get('/compania_aseguradora','CompañiaAseguradoraController@create');
Route::post('/compania_aseguradora','CompañiaAseguradoraController@store');
