<?php

namespace App\Http\Controllers;

use App\Cobertura;
use Illuminate\Http\Request;

class TipoCoberturaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $coberturas = Cobertura::paginate(10);
        $mensaje = "";
        return view('tipo_cobertura', compact('mensaje', 'coberturas'));
    }

    public function store(Request $request)
    {
        $data = array('cobertura' => $request['phd-cobertura']);
        if ($request['phd-it_to_update']) {
            $cobertura = Cobertura::updateOrCreate(
                ['id' => $request['phd-it_to_update']],
                $data);
        } else {
            $cobertura = Cobertura::create($data);
        }

        $coberturas = Cobertura::paginate(10);
        $mensaje = "Tipo de cobertura agregada satisfactoriamente.";

        return view('tipo_cobertura', compact('mensaje', 'coberturas'));

    }
}
