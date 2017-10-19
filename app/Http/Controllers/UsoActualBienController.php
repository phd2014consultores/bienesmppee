<?php

namespace App\Http\Controllers;

use App\UsoActualBien;
use Illuminate\Http\Request;

class UsoActualBienController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $usos_actuales = UsoActualBien::paginate(10);
        $mensaje = "";
        return view('uso_actual', compact('mensaje', 'usos_actuales'));
    }

    public function store(Request $request)
    {
        $data = array('uso_actual' => $request['phd-uso_actual']);
        if ($request['phd-it_to_update']) {
            $uso_actual = UsoActualBien::updateOrCreate(
                ['id' => $request['phd-it_to_update']],
                $data);
        } else {
            $uso_actual = UsoActualBien::create($data);
        }

        $usos_actuales = UsoActualBien::paginate(10);
        $mensaje = "Uso actual agregado satisfactoriamente.";

        return view('uso_actual', compact('mensaje', 'usos_actuales'));

    }
}
