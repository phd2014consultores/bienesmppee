<?php

namespace App\Http\Controllers;

use App\Ubicacion_Administrativa;
use Illuminate\Http\Request;

class UbicacionAdministrativaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $ubicacion_administrativas = Ubicacion_Administrativa::paginate(10);
        $mensaje = "";
        return view('ubicacion_administrativa', compact('mensaje', 'ubicacion_administrativas'));
    }

    public function store(Request $request)
    {
        $data = array('ubicacion' => $request['phd-ubicacion']);
        if ($request['phd-it_to_update']) {
            $ubicacion_administrativa = Ubicacion_Administrativa::updateOrCreate(
                ['id' => $request['phd-it_to_update']],
                $data);
        } else {
            $ubicacion_administrativa = Ubicacion_Administrativa::create($data);
        }

        $ubicacion_administrativas = Ubicacion_Administrativa::paginate(10);
        $mensaje = "Ubicación Administrativa agregada satisfactoriamente.";

        return view('ubicacion_administrativa', compact('mensaje', 'ubicacion_administrativas'));

    }
}
