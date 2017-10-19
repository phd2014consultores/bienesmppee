<?php

namespace App\Http\Controllers;

use App\EstadoUsoBien;
use Illuminate\Http\Request;

class EstadoUsoBienController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $estados_uso_bien = EstadoUsoBien::paginate(10);
        $mensaje = "";
        return view('estado_uso_bien', compact('mensaje', 'estados_uso_bien'));
    }

    public function store(Request $request)
    {
        $data = array('estado_uso' => $request['phd-estado_uso']);
        if ($request['phd-it_to_update']) {
            $estado_uso_bien = EstadoUsoBien::updateOrCreate(
                ['id' => $request['phd-it_to_update']],
                $data);
        } else {
            $estado_uso_bien = EstadoUsoBien::create($data);
        }

        $estados_uso_bien = EstadoUsoBien::paginate(10);
        $mensaje = "Estado del uso del bien agregado satisfactoriamente.";

        return view('estado_uso_bien', compact('mensaje', 'estados_uso_bien'));

    }
}
