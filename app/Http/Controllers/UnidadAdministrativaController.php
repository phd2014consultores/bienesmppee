<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unidades_Administrativas;
use Illuminate\Support\Facades\DB;

class UnidadAdministrativaController extends Controller
{
    public function create()
    {
        $unidades_administrativas = DB::table('unidades__administrativas')->paginate(10);
        $mensaje = "";

        return view('unidad_administrativa', compact('mensaje', 'unidades_administrativas'));
    }

    public function store(Request $request)
    {
    	if($request['phd-denominacion'] == ""){
    		$denominacion = null;
    	} else{
    		$denominacion = $request['phd-denominacion'] ;
    	}


   		$unidad = Unidades_Administrativas::updateOrCreate(
                ['codigo' => $request['phd-codigo']],
   		        [
                    'descripcion' => $request['phd-descripcion'],
                    'codigo_categoria' => $request['phd-codigo_categoria'],
                    'denominacion'=> $denominacion,
                    'codigo_unidad_adscrita'=> $request['phd-codigo_unidad_adscrita'],
   
                ]);

        $unidades_administrativas = DB::table('unidades__administrativas')->paginate(10);
    	$mensaje = "La unidad administrativa ha sido agregada satisfactoriamente.";
         

     return view('unidad_administrativa', compact('mensaje','unidades_administrativas'));

 	}
}
