<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ente;
use App\Sede;
use App\Tipo_Sede;
use App\Ciudad;
use App\Pais;
use App\Parroquia;

class SedeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $tipo_sede = Tipo_Sede::all();
        $ente = Ente::all();
        $sedes = Sede::paginate(10);
        $ciudades = Ciudad::all();
        $parroquias = Parroquia::all();
        $paises = Pais::all();
        $mensaje = "";
        return view('sede', compact('mensaje','ente','sedes','tipo_sede','ciudades','parroquias','paises'));
    }

    public function store(Request $request)
    {
        $ente= Ente::select('*')
            ->where('razon_social', '=', $request['phd-ente'])
            ->get();

        $tipo_sede= Tipo_Sede::select('*')
            ->where('tipo', '=', $request['phd-tipo_sede'])
            ->get();

        if ($tipo_sede != "Otra Tipo de Sede o Lugar"){
            $otra_sede = "noaplica";
        }else {
            $otra_sede = $request['phd-especificacion_tipo_sede'];
        }


        $ciudad= Ciudad::select('*')
            ->where('ciudad', '=', $request['phd-codigo_ciudad_ente'])
            ->get();
        $parroquia= Parroquia::select('*')
            ->where('parroquia', '=', $request['phd-codigo_parroquia_ente'])
            ->get();
        $pais= Pais::select('*')
            ->where('pais', '=', $request['phd-codigo_pais'])
            ->get();
        $sede = Sede::updateOrCreate(
            ['codigo' => $request['phd-codigo']],
            [
                'tipo_id' => $tipo_sede[0]->id,
                'especificacion_tipo_sede' => $otra_sede,
                'descripcion' => $request['phd-descripcion'],
                'localizacion' => $request['phd-localizacion'],
                'codigo_pais' => $pais[0]->id,
                'especifique_otro_pais' => $request['phd-especifique_otro_pais'],
                'parroquia_id' => $parroquia[0]->id,
                'ciudad_id' => $ciudad[0]->id,
                'nombre_otra_ciudad' => null,
                'urbanizacion' => $request['phd-urbanizacion'],
                'calle_avenida' => $request['phd-calle_avenida'],
                'casa_edificio' => $request['phd-casa_edificio'],
                'piso' => $request['phd-piso'],
                'ente_id' => $ente[0]->id

            ]);

        $mensaje = "La sede ha sido agregada satisfactoriamente.";
        $ente = Ente::all();
        $ciudades = Ciudad::all();
        $tipo_sede = Tipo_Sede::all();
        $parroquias = Parroquia::all();
        $paises = Pais::all();
        $sedes = Sede::paginate(10);

        return view('sede', compact('mensaje','ente','sedes','tipo_sede','ciudades','parroquias','paises'));

    }
}
