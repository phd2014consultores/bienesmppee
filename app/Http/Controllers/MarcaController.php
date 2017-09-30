<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Marca;

class MarcaController extends Controller
{
    
       public function cargarmensaje()
    {
       
        $mensaje = "";

     return view('marca', compact('mensaje'));
    }

    public function agregarMarca(Request $request)
    {


   		$marca = Marca::create(
                [  
                   
                    'denominacion_comercial' => $request['phd-denominacion_comercial'],
                    'nombre_fabricante' => $request['phd-nombre_fabricante'],
                    'codigo'=> $request['phd-codigo'],

                ]);

         $mensaje = "Marca agregada satisfactoriamente.";
        

     return view('marca', compact('mensaje'));

 	}
}


