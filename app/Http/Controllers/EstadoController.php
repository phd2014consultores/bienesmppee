<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pais;
use App\Estado;

class EstadoController extends Controller
{
    public function create()
    {
    	$paises = Pais::all();
        $estados = Estado::paginate(10);
        $mensaje = "";
        return view('estado', compact('mensaje', 'estados','paises'));
    }

    public function store(Request $request)
    {

    	$pais= Pais::select('*')
                             ->where('pais', '=', $request['phd-pais'])
                             ->get();

   		$estado = Estado::updateOrCreate(
   				['codigo' => $request['phd-codigo']],
   		
                [
                    'pais_id' => $pais[0]->id,
                    'estado' => $request['phd-descripcion'],
                ]);

        $estados = Estado::paginate(10);
   		$mensaje = "Estado agregado satisfactoriamente.";
   		$paises = Pais::all();

        return view('estado', compact('mensaje', 'estados','paises'));

 	}
}
