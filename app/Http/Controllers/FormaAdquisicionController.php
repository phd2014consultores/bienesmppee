<?php

namespace App\Http\Controllers;

use App\FormaAdquisicion;
use Illuminate\Http\Request;

class FormaAdquisicionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $formas_adquisicion = FormaAdquisicion::paginate(5);
        $mensaje = "";
        return view('forma_adquisicion', compact('mensaje', 'formas_adquisicion'));
    }

    public function store(Request $request)
    {
        $data = array('nombre' => $request['phd-nombre']);
        if ($request['phd-it_to_update']) {
            $forma_adquisicion = FormaAdquisicion::updateOrCreate(
                ['id' => $request['phd-it_to_update']],
                $data);
        } else {
            $forma_adquisicion = FormaAdquisicion::create($data);
        }

        $formas_adquisicion = FormaAdquisicion::paginate(5);
        $mensaje = "Forma de aquisición agregada satisfactoriamente.";

        return view('forma_adquisicion', compact('mensaje', 'formas_adquisicion'));

    }
}
