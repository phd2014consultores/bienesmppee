<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelo;
use App\Marca;

class ModeloController extends Controller
{
    public function cargarmensaje()
    {
    	$marca = Marca::all();
       
        $mensaje = "";

     return view('modelo', compact('mensaje','marca'));
    }

    public function agregarModelo(Request $request)
    {
    	$marca= Marca::select('*')
                             ->where('codigo', '=', $request['phd-marca'])
                             ->get(); 

   		$modelo = Modelo::create(
                [  
                   
                    'denominacion_fabricante' => $request['phd-denominacion_fabricante'],
                    'marca_id' => $marca[0]->id,
                    'codigo'=> $request['phd-codigo'],
                    'codigo_bien'=> $request['phd-codigo_bien'],

                ]);

         $mensaje = "Modelo agregado satisfactoriamente.";
        

     return view('modelo', compact('mensaje'));

 	}
}
