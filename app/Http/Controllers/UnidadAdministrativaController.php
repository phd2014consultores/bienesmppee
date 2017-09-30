<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unidades_Administrativas;

class UnidadAdministrativaController extends Controller
{
    public function cargarmensaje()
    {

    
       
        $mensaje = "";

     return view('unidad_administrativa', compact('mensaje'));
    }

    public function agregarUnidadAdministrativa(Request $request)
    {
    	if($request['phd-denominacion'] == ""){
    		$denominacion = null;
    	} else{
    		$denominacion = $request['phd-denominacion'] ;
    	}


   		$unidad = Unidades_Administrativas::create(
                [  
                    'codigo' => $request['phd-codigo'],
                    'descripcion' => $request['phd-descripcion'],
                    'codigo_categoria' => $request['phd-codigo_categoria'],
                    'denominacion'=> $denominacion,
                    'codigo_unidad_adscrita'=> $request['phd-codigo_unidad_adscrita'],
   
                ]);

         $mensaje = "La unidad administrativa ha sido agregada satisfactoriamente.";
         

     return view('unidad_administrativa', compact('mensaje'));

 	}
}
