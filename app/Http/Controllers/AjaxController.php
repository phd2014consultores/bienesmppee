<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Subcategoria;
use App\Categoria_Especifica;
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


}
