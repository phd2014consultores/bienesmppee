<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ente;
use App\Sede;

class SedeController extends Controller
{
    public function cargarmensaje()
    {

    	$ente = Ente::all();
       
        $mensaje = "";

     return view('sede', compact('mensaje','ente'));
    }

    public function agregarSede(Request $request)
    {

    	$ente= Ente::select('*')
                             ->where('razon_social', '=', $request['phd-ente'])
                             ->get(); 


   		$sede = Sede::create(
                [  
                    'codigo' => $request['phd-codigo'],
                    'tipo_sede' => $request['phd-tipo_sede'],
                    'especificacion_tipo_sede' => $request['phd-especificacion_tipo_sede'],
                    'descripcion'=> $request['phd-descripcion'],
                    'localizacion'=> $request['phd-localizacion'],
                    'codigo_pais'=> $request['phd-codigo_pais'],
                    'especifique_otro_pais'=> $request['phd-especifique_otro_pais'],
                    'codigo_parroquia_ente'=> $request['phd-codigo_parroquia_ente'],
                    'codigo_ciudad_ente'=>$request['phd-codigo_ciudad_ente'],
                    'nombre_otra_ciudad'=> $request['phd-nombre_otra_ciudad'],
                    'urbanizacion'=> $request['phd-urbanizacion'],
                    'calle_avenida'=> $request['phd-calle_avenida'],
                    'casa_edificio'=> $request['phd-casa_edificio'],
                    'piso'=> $request['phd-piso'],
                    'ente_id' => $ente[0]->id

                ]);

         $mensaje = "La sede ha sido agregada satisfactoriamente.";
         $ente = Ente::all();

     return view('sede', compact('mensaje','ente'));

 	}
}
