<?php

namespace App\Http\Controllers;

use App\Ciudad;
use App\Parroquia;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Subcategoria;
use App\CategoriaEspecifica;
use App\Proveedor;
use App\Ente;
use App\Maxima_Autoridad;
use App\Responsable_Patrimonial;
use App\Sede;
use App\Unidades_Administrativas;
use App\Marca;
use App\Modelo;
use App\Estado;
use App\Municipio;
use App\Pais;
use App\FA_Adju_Conf_Expr;

class AjaxController extends Controller
{
  
    public  function obtenerSubcategoria(Request $request) {
        return  Subcategoria::select('*')
                             ->where('categoria_id', '=', $request->id)
                             ->get();
    }

    public  function obtenerCategoriaEspecifica(Request $request) {
        return  CategoriaEspecifica::select('*')
                             ->where('subcategoria_id', '=', $request->id)
                             ->get();
    }

    public  function obtenerProveedor(Request $request) {
        return  Proveedor::find($request->id);
    }

    public  function obtenerEnte(Request $request) {
        return  Ente::find($request->id);
    }

    public  function obtenerMaximaAutoridad(Request $request) {
        return  Maxima_Autoridad::find($request->id);
    }

    public  function obtenerResponsablePatrimonial(Request $request) {
        return  Responsable_Patrimonial::find($request->id);
    }

    public  function obtenerSede(Request $request) {
        return  Sede::find($request->id);
    }

    public  function obtenerUnidadAdministrativa(Request $request) {
        return  Unidades_Administrativas::find($request->id);
    }

    public  function obtenerMarca(Request $request) {
        return  Marca::find($request->id);
    }

    public  function obtenerModelo(Request $request) {
        return  Modelo::find($request->id);
    }

    public  function obtenerEstado(Request $request) {
        return  Estado::find($request->id);
    }

    public  function obtenerMunicipio(Request $request) {
        return  Municipio::find($request->id);
    }

    public  function obtenerPais(Request $request) {
        return  Pais::find($request->id);
    }

    public  function obtenerEstadosPorPais(Request $request) {
        return  Estado::select('*')
                        ->where('pais_id', '=', $request->id)
                        ->get();
    }

    public  function obtenerMunicipiosPorEstado(Request $request) {
        return  Municipio::select('*')
                        ->where('estado_id', '=', $request->id)
                        ->get();
    }

    public  function obtenerParroquiasPorMunicipios(Request $request) {
        return  Parroquia::select('*')
            ->where('municipio_id', '=', $request->id)
            ->get();
    }

    public  function obtenerCiudadesPorMunicipio(Request $request) {
        return  Ciudad::select('*')
            ->where('municipio_id', '=', $request->id)
            ->get();
    }

    public  function obtenerResponsables(Request $request) {
        $key_search = $request->key_search;
        return array(0 => "$key_search 1",1 => "$key_search 2",2 => "$key_search 3");
    }


}
