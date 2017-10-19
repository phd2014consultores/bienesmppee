<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estado;
use App\Municipio;

class MunicipioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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

        $data = array('codigo' => $request['phd-codigo'],'estado_id' => $estado[0]->id,'municipio' => $request['phd-descripcion'] );
        if ($request['phd-it_to_update']) {
            $municipio = Municipio::updateOrCreate(
                ['id' => $request['phd-it_to_update']],
                $data);
        } else {
            $municipio = Municipio::create($data);
        }

        $municipios = Municipio::paginate(10);
   		$mensaje = "Estado agregado satisfactoriamente.";
   		$estados = Estado::all();

        return view('municipio', compact('mensaje', 'estados','municipios'));

 	}
}
