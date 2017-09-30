<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ente;
use App\Responsable_Patrimonial;

class Responsable_PatrimonialController extends Controller
{
    
       public function cargarmensaje()
    {

    	$ente = Ente::all();
       
        $mensaje = "";

     return view('responsable_patrimonial', compact('mensaje','ente'));
    }

    public function agregarResponsablePatrimonial(Request $request)
    {

    	$ente= Ente::select('*')
                             ->where('razon_social', '=', $request['phd-ente'])
                             ->get(); 


   		$responsable = Responsable_Patrimonial::create(
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

         $mensaje = "Responsable patrimonial agregado satisfactoriamente.";
         $ente = Ente::all();

     return view('responsable_patrimonial', compact('mensaje','ente'));

 	}
}
