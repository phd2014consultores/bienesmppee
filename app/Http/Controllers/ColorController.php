<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Color;

class ColorController extends Controller
{
    public function create()
    {
        $colores = Color::paginate(10);
        $mensaje = "";
        return view('color', compact('mensaje', 'colores'));
    }

    public function store(Request $request)
    {

        $color = Color::updateOrCreate(
            ['color' => $request['phd-color']],

            [
            ]);

        $colores = Color::paginate(10);
        $mensaje = "Color agregado satisfactoriamente.";

        return view('color', compact('mensaje', 'colores'));

    }
}
