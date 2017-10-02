<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ente;
use App\Responsable_Patrimonial;
use Illuminate\Support\Facades\DB;

class Responsable_PatrimonialController extends Controller
{
    
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
   		$responsable = Responsable_Patrimonial::updateOrCreate(
                ['ci' => $request['phd-ci']],
   		        [
                    'nombre' => $request['phd-nombre'],
                    'apellido' => $request['phd-apellido'],
                    'telefono'=> $request['phd-telefono'],
                    'cargo'=> $request['phd-cargo'],
                    'telefono'=> $request['phd-telefono'],
                    'correo_electronico'=> $request['phd-correo_electronico'],
                    'numero_gaceta'=> $request['phd-numero_gaceta'],
                    'fecha_gaceta'=>str_replace("/", "",  $request['phd-fecha_gaceta']),
                    'numero_resolucion_decreto'=> $request['phd-numero_decreto'],
                    'fecha_resolucion_decreto'=>str_replace("/", "",  $request['phd-fecha_decreto']),
                    'habilitado' => ($request['phd-habilitado'] == "SI") ? true : false,
                    'ente_id' => $ente[0]->id

                ]);
        if ($request['phd-habilitado'] == "SI") {
            Responsable_Patrimonial::where('ci','!=', $request['phd-ci'])->update(['habilitado' => false]);
        }
        $mensaje = "Responsable patrimonial agregado satisfactoriamente.";
        $ente = Ente::all();
        $responsables_patrimoniales = DB::table('responsable__patrimonials')->paginate(10);

        return view('responsable_patrimonial', compact('mensaje','ente','responsables_patrimoniales'));

 	}
}
