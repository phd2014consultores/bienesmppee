<?php

namespace App\Http\Controllers;

use App\Tipo_Sede;
use App\UsoActualBien;
use Illuminate\Http\Request;

class TipoSedeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $tipos_sedes = Tipo_Sede::paginate(10);
        $mensaje = "";
        return view('tipo_sede', compact('mensaje', 'tipos_sedes'));
    }

    public function store(Request $request)
    {
        $data = array('tipo' => $request['phd-tipo_sede']);
        if ($request['phd-it_to_update']) {
            $tipo_sede = Tipo_Sede::updateOrCreate(
                ['id' => $request['phd-it_to_update']],
                $data);
        } else {
            $tipo_sede = Tipo_Sede::create($data);
        }

        $tipos_sedes = Tipo_Sede::paginate(10);
        $mensaje = "Tipo de sede agregado satisfactoriamente.";

        return view('tipo_sede', compact('mensaje', 'tipos_sedes'));

    }
}
