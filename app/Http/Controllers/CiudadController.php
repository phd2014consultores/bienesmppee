<?php

namespace App\Http\Controllers;

use App\Municipio;
use Illuminate\Http\Request;
use App\Ciudad;
use App\Estado;

class CiudadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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

        $data = array('codigo' => $request['phd-codigo'],'municipio_id' => $municipio[0]->id,'ciudad' => $request['phd-ciudad'] );
        if ($request['phd-it_to_update']) {
            $ciudad = Ciudad::updateOrCreate(
                ['id' => $request['phd-it_to_update']],
                $data);
        } else {
            $ciudad = Ciudad::create($data);
        }

        $ciudades = Ciudad::paginate(10);
        $estados = Estado::all();
        $mensaje = "Ciudad agregada satisfactoriamente.";

        return view('ciudad', compact('mensaje', 'ciudades', 'estados'));

    }
}
