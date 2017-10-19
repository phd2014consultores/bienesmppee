<?php

namespace App\Http\Controllers;

use App\Municipio;
use Illuminate\Http\Request;
use App\Parroquia;
use App\Estado;

class ParroquiaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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

        $data = array('codigo' => $request['phd-codigo'],'municipio_id' => $municipio[0]->id,'parroquia' => $request['phd-parroquia'] );
        if ($request['phd-it_to_update']) {
            $parroquia = Parroquia::updateOrCreate(
                ['id' => $request['phd-it_to_update']],
                $data);
        } else {
            $parroquia = Parroquia::create($data);
        }

        $parroquias = Parroquia::paginate(10);
        $estados = Estado::all();
        $mensaje = "Parroquia agregada satisfactoriamente.";

        return view('parroquia', compact('mensaje', 'parroquias', 'estados'));

    }
}
