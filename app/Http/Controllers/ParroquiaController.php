<?php

namespace App\Http\Controllers;

use App\Municipio;
use Illuminate\Http\Request;
use App\Parroquia;
use App\Estado;

class ParroquiaController extends Controller
{
    public function create()
    {
        $parroquias = Parroquia::paginate(10);
        $estados = Estado::all();
        $mensaje = "";
        return view('parroquia', compact('mensaje', 'parroquias', 'estados'));
    }

    public function store(Request $request)
    {
        $municipio = Municipio::select('*')
            ->where('municipio', '=', $request['phd-estado_municipios'])
            ->get();

        $parroquia = Parroquia::updateOrCreate(
            ['codigo' => $request['phd-codigo']],

            [
                'parroquia' => $request['phd-parroquia'],
                'municipio_id' => $municipio[0]->id,
            ]);

        $parroquias = Parroquia::paginate(10);
        $estados = Estado::all();
        $mensaje = "Parroquia agregada satisfactoriamente.";

        return view('parroquia', compact('mensaje', 'parroquias', 'estados'));

    }
}
