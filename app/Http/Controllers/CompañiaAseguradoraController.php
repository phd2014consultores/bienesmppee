<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estado_Bien;

class EstadoBienController extends Controller
{
    public function create()
    {
        $estados_bien = Estado_Bien::paginate(10);
        $mensaje = "";
        return view('estado_bien', compact('mensaje', 'estados_bien'));
    }

    public function store(Request $request)
    {
        $estado_bien = Estado_Bien::updateOrCreate(
            ['estado_bien' => $request['phd-estado_bien']],

            [
            ]);

        $estados_bien = Estado_Bien::paginate(10);
        $mensaje = "Estado del bien agregado satisfactoriamente.";

        return view('estado_bien', compact('mensaje', 'estados_bien'));

    }
}
