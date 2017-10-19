<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pais;
use App\Estado;

class EstadoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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

        $data = array('codigo' => $request['phd-codigo'],'pais_id' => $pais[0]->id,'estado' => $request['phd-descripcion'] );
        if ($request['phd-it_to_update']) {
            $estado = Estado::updateOrCreate(
                ['id' => $request['phd-it_to_update']],
                $data);
        } else {
            $estado = Estado::create($data);
        }

        $estados = Estado::paginate(10);
   		$mensaje = "Estado agregado satisfactoriamente.";
   		$paises = Pais::all();

        return view('estado', compact('mensaje', 'estados','paises'));

 	}
}
