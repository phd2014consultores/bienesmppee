<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Color;

class ColorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $colores = Color::paginate(10);
        $mensaje = "";
        return view('color', compact('mensaje', 'colores'));
    }

    public function store(Request $request)
    {

        $data = array('color' => $request['phd-color']);
        if ($request['phd-it_to_update']) {
            $color = Color::updateOrCreate(
                ['id' => $request['phd-it_to_update']],
                $data);
        } else {
            $color = Color::create($data);
        }

        $colores = Color::paginate(10);
        $mensaje = "Color agregado satisfactoriamente.";

        return view('color', compact('mensaje', 'colores'));

    }
}
