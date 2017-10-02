<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Subcategoria;
use App\Categoria_Especifica;
use App\Proveedor;
use App\Ente;
use App\Maxima_Autoridad;
use App\Responsable_Patrimonial;
use App\Sede;
use App\Unidades_Administrativas;
use App\Marca;
use App\Modelo;
use App\FA_Adju_Conf_Expr;

class AjaxController extends Controller
{
  
    public  function obtenerSubcategoria(Request $request) {
        return  Subcategoria::select('*')
                             ->where('categoria_id', '=', $request->id)
                             ->get();
    }

    public  function obtenerCategoriaEspecifica(Request $request) {
        return  Categoria_Especifica::select('*')
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


}
