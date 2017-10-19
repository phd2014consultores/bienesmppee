<?php

namespace App\Http\Controllers;

use App\Moneda;
use Illuminate\Http\Request;

class MonedaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $monedas = Moneda::paginate(10);
        $mensaje = "";
        return view('moneda', compact('mensaje', 'monedas'));
    }

    public function store(Request $request)
    {
        $data = array('moneda' => $request['phd-moneda']);
        if ($request['phd-it_to_update']) {
            $moneda = Moneda::updateOrCreate(
                ['id' => $request['phd-it_to_update']],
                $data);
        } else {
            $moneda = Moneda::create($data);
        }

        $monedas = Moneda::paginate(10);
        $mensaje = "Moneda agregada satisfactoriamente.";

        return view('moneda', compact('mensaje', 'monedas'));

    }
}
