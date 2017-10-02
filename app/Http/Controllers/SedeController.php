<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ente;
use App\Sede;
use App\Tipo_Sede;
use App\Pais;
use Illuminate\Support\Facades\DB;

class SedeController extends Controller
{
    public function create()
    {
        $tipo_sede = Tipo_Sede::all();
        $pais = Pais::all();
        $ente = Ente::all();
        $sedes = DB::table('sedes')->paginate(10);
        $mensaje = "";
        return view('sede', compact('mensaje','ente','sedes','tipo_sede','pais'));
    }

    public function store(Request $request)
    {

    	$ente= Ente::select('*')
                             ->where('razon_social', '=', $request['phd-ente'])
                             ->get();

        $tipo_sede= Tipo_Sede::select('*')
                             ->where('tipo', '=', $request['phd-tipo_sede'])
                             ->get();

        $pais= Pais::select('*')
                             ->where('pais', '=', $request['phd-pais'])
                             ->get();

        if ($tipo_sede != "Otra Tipo de Sede o Lugar"){
            $otra_sede = "noaplica";
        }else {
            $otra_sede = $request['phd-especificacion_tipo_sede'];
        }

        if ($pais != "Otro País"){
            $otro_pais = "noaplica";
        }else {
            $otro_pais = $request['phd-especifique_otro_pais'];
        }


        if ($request['phd-localizacion'] == "Nacional"){
            $localizacion = "N";
        }else {
            $localizacion = "I";
        }

   		$sede = Sede::updateOrCreate(
   		        ['codigo' => $request['phd-codigo']],
                [
                    'tipo_sede' => $tipo_sede[0]->id,
                    'especificacion_tipo_sede' => $otra_sede,
                    'descripcion'=> $request['phd-descripcion'],
                    'localizacion'=> $localizacion,
                    'codigo_pais'=> $pais[0]->id,
                    'especifique_otro_pais'=> $otro_pais,
                    'codigo_parroquia_ente'=> $request['phd-codigo_parroquia_ente'],
                    'codigo_ciudad_ente'=>$request['phd-codigo_ciudad_ente'],
                    'nombre_otra_ciudad'=> $request['phd-nombre_otra_ciudad'],
                    'urbanizacion'=> $request['phd-urbanizacion'],
                    'calle_avenida'=> $request['phd-calle_avenida'],
                    'casa_edificio'=> $request['phd-casa_edificio'],
                    'piso'=> $request['phd-piso'],
                    'ente_id' => $ente[0]->id

                ]);

   		$mensaje = "La sede ha sido agregada satisfactoriamente.";
        $ente = Ente::all();
        $pais = Pais::all();
        $ente = Ente::all();
        $tipo_sede = Tipo_Sede::all();
        $sedes = DB::table('sedes')->paginate(10);


        return view('sede', compact('mensaje','ente','sedes','tipo_sede'));

 	}
}
