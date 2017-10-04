<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unidad_Medida;

class UnidadMedidaController extends Controller
{
    public function create()
    {
        $unidades_medida = Unidad_Medida::paginate(10);
        $mensaje = "";
        return view('unidad_medida', compact('mensaje', 'unidades_medida'));
    }

    public function store(Request $request)
    {

        $unidad_medida = Unidad_Medida::updateOrCreate(
            ['unidad' => $request['phd-unidad']],

            [
                'simbolo' => $request['phd-simbolo'],
                'tipo' => $request['phd-tipo'],
            ]);

        $unidades_medida = Unidad_Medida::paginate(10);
        $mensaje = "Unidad de Medida agregada satisfactoriamente.";

        return view('unidad_medida', compact('mensaje', 'unidades_medida'));

    }
}
