<?php

namespace App\Http\Controllers;

use App\Municipio;
use Illuminate\Http\Request;
use App\Ciudad;
use App\Estado;

class CiudadController extends Controller
{
    public function create()
    {
        $ciudades = Ciudad::paginate(10);
        $estados = Estado::all();
        $mensaje = "";
        return view('ciudad', compact('mensaje', 'ciudades', 'estados'));
    }

    public function store(Request $request)
    {
        $municipio = Municipio::select('*')
            ->where('municipio', '=', $request['phd-estado_municipios'])
            ->get();

        $ciudad = Ciudad::updateOrCreate(
            ['codigo' => $request['phd-codigo']],

            [
                'ciudad' => $request['phd-ciudad'],
                'municipio_id' => $municipio[0]->id,
            ]);

        $ciudades = Ciudad::paginate(10);
        $estados = Estado::all();
        $mensaje = "Ciudad agregada satisfactoriamente.";

        return view('ciudad', compact('mensaje', 'ciudades', 'estados'));

    }
}
