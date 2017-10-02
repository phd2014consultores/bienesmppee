<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelo;
use App\Marca;
use Illuminate\Support\Facades\DB;

class ModeloController extends Controller
{
    public function create()
    {
    	$marcas = Marca::all();
        $modelos = Modelo::paginate(10);
        $mensaje = "";

        return view('modelo', compact('mensaje','marcas', 'modelos'));
    }

    public function store(Request $request)
    {
    	$marca= Marca::select('*')
                             ->where('denominacion_comercial', '=', $request['phd-marca'])
                             ->get(); 

   		$modelo = Modelo::updateOrCreate(
   		        ['codigo'=> $request['phd-codigo']],
                [  
                   
                    'denominacion_fabricante' => $request['phd-denominacion_fabricante'],
                    'marca_id' => $marca[0]->id,
                    'codigo_bien'=> $request['phd-codigo_bien'],

                ]);
        $modelos = Modelo::paginate(10);
        $marcas = Marca::all();
        $mensaje = "Modelo agregado satisfactoriamente.";
        

     return view('modelo', compact('mensaje', 'marcas', 'modelos'));

 	}
}
