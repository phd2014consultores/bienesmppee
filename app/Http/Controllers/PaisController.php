<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pais;

class PaisController extends Controller
{
    public function create()
    {
        $paises = Pais::paginate(10);
        $mensaje = "";
        return view('pais', compact('mensaje', 'paises'));
    }

    public function store(Request $request)
    {

        $pais = Pais::updateOrCreate(
            ['pais' => $request['phd-pais']],

            [
            ]);

        $paises = Pais::paginate(10);
        $mensaje = "País agregado satisfactoriamente.";

        return view('pais', compact('mensaje', 'paises'));

    }
}
