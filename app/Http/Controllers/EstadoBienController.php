<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EstadoBien;

class EstadoBienController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $estados_bien = EstadoBien::paginate(10);
        $mensaje = "";
        return view('estado_bien', compact('mensaje', 'estados_bien'));
    }

    public function store(Request $request)
    {
        $estado_bien = EstadoBien::updateOrCreate(
            ['estado_bien' => $request['phd-estado_bien']],

            [
            ]);

        $estados_bien = EstadoBien::paginate(10);
        $mensaje = "Estado del bien agregado satisfactoriamente.";

        return view('estado_bien', compact('mensaje', 'estados_bien'));

    }
}
