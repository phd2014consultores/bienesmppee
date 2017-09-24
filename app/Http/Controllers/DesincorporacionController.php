<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tipo_Bien;
use App\Estado_Uso_Bien;
use App\Bien;
use App\Fotos;



class DesincorporacionController extends Controller
{
     public function cargarBienes()
    {
     	$bien= Bien::select('*')
                             ->where('habilitado', '=', true)
                             ->get();   

        $estado_uso = Estado_Uso_Bien::all(); 
	
        $mensaje = "";

     return view('desincorporar', compact('bien','mensaje','estado_uso'));
 	}


public function actualizarBien(Request $request)
    {


     	$bien= Bien::find($request['idBienSeleccionado']);

    	$estado_uso = Estado_Uso_Bien::select('*')
                        ->where('estado_uso', '=', $request['phd-desincorporacion_estado_uso'])
                        ->get(); 

    	$bien->estado_uso_id = $estado_uso[0]->id;
    	$bien->habilitado= False;    
     	$bien->save();                         
        
     	foreach ($request['phd-desincorporacion_files'] as $photo) {
            $filename = $photo->store('bien/desincorporado/'.$request['idBienSeleccionado']);
            Fotos::create([
                'bien_id' => $request['idBienSeleccionado'],
                'url' => '/storage/app/bien/desincorporado/'.$request['idBienSeleccionado'].'/'.$filename
            ]);
        }

        $bien= Bien::select('*')
                             ->where('habilitado', '=', true)
                             ->get();   

        $estado_uso = Estado_Uso_Bien::all(); 
     	$mensaje = "Bien desincorporado satisfactoriamente.";
     	
     return view('desincorporar', compact('bien','mensaje','estado_uso'));

 	}




}
