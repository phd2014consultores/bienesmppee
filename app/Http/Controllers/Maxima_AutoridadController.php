<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ente;
use App\Maxima_Autoridad;

class Maxima_AutoridadController extends Controller
{
       public function cargarmensaje()
    {

    	$ente = Ente::all();
       
        $mensaje = "";

     return view('maxima_autoridad', compact('mensaje','ente'));
    }

    public function agregarMaximaAutoridad(Request $request)
    {

    	$ente= Ente::select('*')
                             ->where('razon_social', '=', $request['phd-ente'])
                             ->get(); 


   		$maxima_autoridad = Maxima_Autoridad::create(
                [  
                    'ci' => $request['phd-ci'],
                    'nombre' => $request['phd-nombre'],
                    'apellido' => $request['phd-apellido'],
                    'telefono'=> $request['phd-telefono'],
                    'cargo'=> $request['phd-cargo'],
                    'telefono'=> $request['phd-telefono'],
                    'correo_electronico'=> $request['phd-correo_electronico'],
                    'numero_gaceta'=> $request['phd-numero_gaceta'],
                    'fecha_gaceta'=>str_replace("/", "",  $request['phd-fecha_gaceta']),
                    'numero_resolucion_decreto'=> $request['phd-numero_decreto'],
                    'fecha_resolucion_decreto'=>str_replace("/", "",  $request['phd-fecha_decreto']),
                    'habilitado' => True,
                    'ente_id' => $ente[0]->id

                ]);

         $mensaje = "Máxima autoridad agregada satisfactoriamente.";
         $ente = Ente::all();

     return view('maxima_autoridad', compact('mensaje','ente'));

 	}
}