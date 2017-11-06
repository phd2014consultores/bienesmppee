<?php

namespace App\Http\Controllers;

use App\Datos_Especificos_Asignacion;
use App\FormaAdquisicion;
use App\TipoBien;
use Illuminate\Http\Request;
use App\Bien;

class TableroController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $tipo_bien = TipoBien::where('nombre','=',($request['phd-tipo_bien']) ? $request['phd-tipo_bien'] : '')->get();
        $forma_adquisicion = FormaAdquisicion::where('nombre','=',($request['phd-forma_adquisicion']) ? $request['phd-forma_adquisicion'] : '')->get();
        $responsable = Datos_Especificos_Asignacion::where(
            'responsable_administrativo',
            '=',
            ($request['phd-responsable_administrativo']) ? $request['phd-responsable_administrativo'] : '')
            ->orWhere(
                'responsable_uso_directo',
                '=',
                ($request['phd-responsable_uso_directo']) ? $request['phd-responsable_uso_directo'] : '')->get();
        $responsables_id = array();
        for ($i = 0; $i < count($responsable); ++$i) {
            $responsables_id[$i] = $responsable[$i]->id;
        }
        $bien = Bien::all();
        if (count($responsables_id)){
            $bien = Bien::where(
                'tipo_bien_id',
                ($tipo_bien->count())? '=' : '!=',
                ($tipo_bien->count())? $tipo_bien[0]->id : NULL)->
            where(
                'forma_adquisicion_id',
                ($forma_adquisicion->count())? '=' : '!=',
                ($forma_adquisicion->count())? $forma_adquisicion[0]->id : NULL)->
            whereIn(
                'responsable_id',
                $responsables_id
            )->paginate(10);
        }else{
            $bien = Bien::where(
                'tipo_bien_id',
                ($tipo_bien->count())? '=' : '!=',
                ($tipo_bien->count())? $tipo_bien[0]->id : NULL)->
            where(
                'forma_adquisicion_id',
                ($forma_adquisicion->count())? '=' : '!=',
                ($forma_adquisicion->count())? $forma_adquisicion[0]->id : NULL)->
            where(
                'responsable_id','!=',NULL
            )->paginate(10);
        }


        $filtro = array();

        $filtro['tipo_bien'] = ($tipo_bien->count()) ? $tipo_bien[0]->nombre : false;
        $filtro['forma_adquisicion'] = ($forma_adquisicion->count()) ? $forma_adquisicion[0]->nombre : false;
        $filtro['responsable_administrativo'] = ($request['phd-responsable_administrativo']) ? $request['phd-responsable_administrativo'] : false;
        $filtro['responsable_uso_directo'] = ($request['phd-responsable_uso_directo']) ? $request['phd-responsable_uso_directo'] : false;

        $tipo_bienes = TipoBien::all();
        $formas_adquisiciones = FormaAdquisicion::all();

        return view('tablero',
            compact(
                'bien',
                'tipo_bienes',
                'formas_adquisiciones',
                'filtro'));
 	}
}
