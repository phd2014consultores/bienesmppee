<?php

namespace App\Http\Controllers;

use App\Ubicacion_Administrativa;
use Illuminate\Http\Request;
use App\Unidades_Administrativas;
use Illuminate\Support\Facades\DB;

class UnidadAdministrativaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $unidades_administrativas = Unidades_Administrativas::paginate(10);
        $ubicaciones_administrativas = Ubicacion_Administrativa::all()->get();
        $mensaje = "";

        return view('unidad_administrativa', compact('mensaje', 'unidades_administrativas','ubicaciones_administrativas'));
    }

    public function store(Request $request)
    {
    	$data = array('codigo' => $request['phd-codigo'],
            'descripcion' => $request['phd-descripcion'],
            'codigo_categoria' => $request['phd-codigo_categoria'],
            'denominacion' => ($request['phd-denominacion'] == "") ? NULL : $request['phd-denominacion'],
            'codigo_unidad_adscrita' => $request['phd-codigo_unidad_adscrita']);
        if ($request['phd-it_to_update']) {
            $unidad = Unidades_Administrativas::updateOrCreate(
                ['id' => $request['phd-it_to_update']],
                $data);
        } else {
            $unidad = Unidades_Administrativas::create($data);
        }

        $unidades_administrativas = Unidades_Administrativas::paginate(10);
        $ubicaciones_administrativas = Ubicacion_Administrativa::all()->get();
    	$mensaje = "La unidad administrativa ha sido agregada satisfactoriamente.";
         

     return view('unidad_administrativa', compact('mensaje','unidades_administrativas','ubicaciones_administrativas'));

 	}
}
