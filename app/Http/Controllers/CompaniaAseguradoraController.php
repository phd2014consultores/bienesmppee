<?php

namespace App\Http\Controllers;

use App\CompaniaAseguradora;
use Illuminate\Http\Request;

class CompaniaAseguradoraController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $companias_aseguradoras = CompaniaAseguradora::paginate(10);
        $mensaje = "";
        return view('compania_aseguradora', compact('mensaje', 'companias_aseguradoras'));
    }

    public function store(Request $request)
    {
        $data = array('nombre' => $request['phd-nombre']);
        if ($request['phd-it_to_update']) {
            $compania_aseguradora = CompaniaAseguradora::updateOrCreate(
                ['id' => $request['phd-it_to_update']],
                $data);
        } else {
            $compania_aseguradora = CompaniaAseguradora::create($data);
        }

        $companias_aseguradoras = CompaniaAseguradora::paginate(10);
        $mensaje = "Compañía aseguradora agregada satisfactoriamente.";

        return view('compania_aseguradora', compact('mensaje', 'companias_aseguradoras'));

    }
}
