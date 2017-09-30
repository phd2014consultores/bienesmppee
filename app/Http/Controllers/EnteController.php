<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ente;

class EnteController extends Controller
{
    public function cargarmensaje()
    {
       
        $mensaje = "";

     return view('ente', compact('mensaje'));
    }

    public function agregarEnte(Request $request)
    {

   		$ente = Ente::create(
                [  
                    'rif' => $request['phd-rif'],
                    'codigo_rgbp' => $request['phd-codigo_rgbp'],
                    'codigo_sicegof' => $request['phd-codigo_sigecof'],
                    'siglas'=> $request['phd-siglas'],
                    'razon_social'=> $request['phd-razon_social'],
                    'telefono'=> $request['phd-telefono'],
                    'direccion_web'=> $request['phd-direccion_web'],
                    'correo_electronico'=> $request['phd-correo_electronico'],
                    'fecha_gaceta'=>str_replace("/", "",  $request['phd-fecha_gaceta']),
                    'numero_gaceta'=> $request['phd-numero_gaceta'],
                    'habilitado'=>True,
                ]);

         $mensaje = "Ente agregado satisfactoriamente.";

     return view('ente', compact('mensaje'));

 	}
}

