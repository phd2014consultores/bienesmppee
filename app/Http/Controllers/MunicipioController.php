<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estado;
use App\Municipio;

class MunicipioController extends Controller
{
     public function create()
    {
    	$estados = Estado::all();
        $municipios = Municipio::paginate(10);
        $mensaje = "";
        return view('municipio', compact('mensaje', 'estados','municipios'));
    }

    public function store(Request $request)
    {

    	$estado= Estado::select('*')
                             ->where('estado', '=', $request['phd-estado'])
                             ->get();

   		$municipio = Municipio::updateOrCreate(
   				['codigo' => $request['phd-codigo']],
   		
                [
                    'estado_id' => $estado[0]->id,
                    'municipio' => $request['phd-descripcion'],
                ]);

        $municipios = Municipio::paginate(10);
   		$mensaje = "Estado agregado satisfactoriamente.";
   		$estados = Estado::all();

        return view('municipio', compact('mensaje', 'estados','municipios'));

 	}
}
