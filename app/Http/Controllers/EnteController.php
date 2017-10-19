<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ente;
use Illuminate\Support\Facades\DB;

class EnteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $entes = DB::table('entes')->paginate(10);
        $mensaje = "";
        return view('ente', compact('mensaje', 'entes'));
    }

    public function store(Request $request)
    {

        $data = array('rif' => $request['phd-rif'],
            'codigo_rgbp' => $request['phd-codigo_rgbp'],
            'codigo_sicegof' => $request['phd-codigo_sigecof'],
            'siglas' => $request['phd-siglas'],
            'razon_social' => $request['phd-razon_social'],
            'telefono' => $request['phd-telefono'],
            'direccion_web' => $request['phd-direccion_web'],
            'correo_electronico' => $request['phd-correo_electronico'],
            'fecha_gaceta' => str_replace("/", "",  $request['phd-fecha_gaceta']),
            'numero_gaceta' => $request['phd-numero_gaceta'],
            'habilitado' => ($request['phd-habilitado'] == "SI") ? true : false);
        if ($request['phd-it_to_update']) {
            $ente = Ente::updateOrCreate(
                ['id' => $request['phd-it_to_update']],
                $data);
        } else {
            $ente = Ente::create($data);
        }
   		if ($request['phd-habilitado'] == "SI") {
            Ente::where('rif','!=', $request['phd-rif'])->update(['habilitado' => false]);
        }
        $entes = DB::table('entes')->paginate(10);
        $mensaje = "Ente agregado satisfactoriamente.";

     return view('ente', compact('mensaje', 'entes'));

 	}
}

