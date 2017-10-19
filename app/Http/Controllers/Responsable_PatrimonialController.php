<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ente;
use App\Responsable_Patrimonial;
use Illuminate\Support\Facades\DB;

class Responsable_PatrimonialController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
    	$ente = Ente::all();
        $responsables_patrimoniales = DB::table('responsable__patrimonials')->paginate(10);
        $mensaje = "";
        return view('responsable_patrimonial', compact('mensaje','ente','responsables_patrimoniales'));
    }

    public function store(Request $request)
    {

    	$ente= Ente::select('*')
                             ->where('razon_social', '=', $request['phd-ente'])
                             ->get();
        $data = array('ci' => $request['phd-ci'],
            'nombre' => $request['phd-nombre'],
            'apellido' => $request['phd-apellido'],
            'telefono' => $request['phd-telefono'],
            'cargo' => $request['phd-cargo'],
            'correo_electronico' => $request['phd-correo_electronico'],
            'numero_gaceta' => $request['phd-numero_gaceta'],
            'correo_electronico' => $request['phd-correo_electronico'],
            'fecha_gaceta' => str_replace("/", "",  $request['phd-fecha_gaceta']),
            'numero_gaceta' => $request['phd-numero_gaceta'],
            'numero_resolucion_decreto' => $request['phd-numero_decreto'],
            'fecha_resolucion_decreto' => str_replace("/", "",  $request['phd-fecha_decreto']),
            'habilitado' => ($request['phd-habilitado'] == "SI") ? true : false);
        if ($request['phd-it_to_update']) {
            $responsable = Responsable_Patrimonial::updateOrCreate(
                ['id' => $request['phd-it_to_update']],
                $data);
        } else {
            $responsable = Responsable_Patrimonial::create($data);
        }
        if ($request['phd-habilitado'] == "SI") {
            Responsable_Patrimonial::where('ci','!=', $request['phd-ci'])->update(['habilitado' => false]);
        }
        $mensaje = "Responsable patrimonial agregado satisfactoriamente.";
        $ente = Ente::all();
        $responsables_patrimoniales = DB::table('responsable__patrimonials')->paginate(10);

        return view('responsable_patrimonial', compact('mensaje','ente','responsables_patrimoniales'));

 	}
}
