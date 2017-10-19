<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ente;
use App\Maxima_Autoridad;
use Illuminate\Support\Facades\DB;

class Maxima_AutoridadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {

    	$ente = Ente::all();
        $maximas_autoridades = DB::table('maxima__autoridads')->paginate(10);
        $mensaje = "";

     return view('maxima_autoridad', compact('mensaje','ente','maximas_autoridades'));
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
            $maxima_autoridad = Maxima_Autoridad::updateOrCreate(
                ['id' => $request['phd-it_to_update']],
                $data);
        } else {
            $maxima_autoridad = Maxima_Autoridad::create($data);
        }
        if ($request['phd-habilitado'] == "SI") {
            Maxima_Autoridad::where('ci','!=', $request['phd-ci'])->update(['habilitado' => false]);
        }
        $maximas_autoridades = DB::table('maxima__autoridads')->paginate(10);
   		$mensaje = "Máxima autoridad agregada satisfactoriamente.";
        $ente = Ente::all();

        return view('maxima_autoridad', compact('mensaje','ente','maximas_autoridades'));

 	}
}
