<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tipo_Bien;
use App\EstadoUsoBien;
use App\Bien;
use App\Fotos;



class DesincorporacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
     	$bien= Bien::select('*')
                             ->where('habilitado', '=', true)
                             ->get();   

        $estado_uso = EstadoUsoBien::all();
	
        $mensaje = "";

     return view('desincorporar', compact('bien','mensaje','estado_uso'));
 	}


public function store(Request $request)
    {


     	$bien= Bien::find($request['idBienSeleccionado']);

    	$estado_uso = EstadoUsoBien::select('*')
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

        $estado_uso = EstadoUsoBien::all();
     	$mensaje = "Bien desincorporado satisfactoriamente.";
     	
     return view('desincorporar', compact('bien','mensaje','estado_uso'));

 	}




}
