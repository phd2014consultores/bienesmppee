<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pais;

class PaisController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $paises = Pais::paginate(10);
        $mensaje = "";
        return view('pais', compact('mensaje', 'paises'));
    }

    public function store(Request $request)
    {

        $data = array('pais' => $request['phd-pais']);
        if ($request['phd-it_to_update']) {
            $pais = Pais::updateOrCreate(
                ['id' => $request['phd-it_to_update']],
                $data);
        } else {
            $pais = Categoria::create($data);
        }

        $paises = Pais::paginate(10);
        $mensaje = "País agregado satisfactoriamente.";

        return view('pais', compact('mensaje', 'paises'));

    }
}
