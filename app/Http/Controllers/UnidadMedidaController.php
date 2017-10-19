<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UnidadMedida;

class UnidadMedidaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $unidades_medida = UnidadMedida::paginate(10);
        $mensaje = "";
        return view('unidad_medida', compact('mensaje', 'unidades_medida'));
    }

    public function store(Request $request)
    {

        $data = array('unidad' => $request['phd-unidad'],'simbolo' => $request['phd-simbolo'],'tipo' => $request['phd-tipo']);
        if ($request['phd-it_to_update']) {
            $unidad_medida = UnidadMedida::updateOrCreate(
                ['id' => $request['phd-it_to_update']],
                $data);
        } else {
            $unidad_medida = UnidadMedida::create($data);
        }

        $unidades_medida = UnidadMedida::paginate(10);
        $mensaje = "Unidad de Medida agregada satisfactoriamente.";

        return view('unidad_medida', compact('mensaje', 'unidades_medida'));

    }
}
