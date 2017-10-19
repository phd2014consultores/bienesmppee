<?php

namespace App\Http\Controllers;

use App\TipoBien;
use Illuminate\Http\Request;

class TipoBienController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $tipo_bienes = TipoBien::paginate(10);
        $mensaje = "";
        return view('tipo_bien', compact('mensaje', 'tipo_bienes'));
    }

    public function store(Request $request)
    {
        $data = array('nombre' => $request['phd-nombre']);
        if ($request['phd-it_to_update']) {
            $tipo_bien = TipoBien::updateOrCreate(
                ['id' => $request['phd-it_to_update']],
                $data);
        } else {
            $tipo_bien = TipoBien::create($data);
        }

        $tipo_bienes = TipoBien::paginate(10);
        $mensaje = "Tipo de bien agregado satisfactoriamente.";

        return view('tipo_bien', compact('mensaje', 'tipo_bienes'));

    }
}
