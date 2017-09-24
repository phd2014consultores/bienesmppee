<?php

namespace App\Http\Controllers;

use Storage;
use Illuminate\Http\Request;
use App\Ente;
use App\Maxima_Autoridad;
use App\Responsable_Patrimonial;

class GeneradorArchivosController extends Controller
{
    public function datosBasicos(){

		$ente = Ente::all();
		Storage::append('public/archivos/ente/basicos.txt', $ente[0]->rif_organismo.';'.$ente[0]->codigo_rgbp.';'. $ente[0]->fecha_remision_inventario);
		
		Storage::append('public/archivos/ente/basicos.txt', $ente[0]->codigo_sicegof.';'.$ente[0]->siglas.';'.$ente[0]->rif.';'.$ente[0]->razon_social.';'.$ente[0]->telefono.';'.$ente[0]->direccion_web.';'.$ente[0]->correo_electronico.';'.$ente[0]->fecha_gaceta.';'.$ente[0]->numero_gaceta);
	

	return response()->download(storage_path().'/app/public/archivos/ente/basicos.txt');
    }


    public function datosMaximaAutoridad(){

		$maxima_autoridad = Maxima_Autoridad::all();

		Storage::append('public/archivos/ente/autoridad.txt', $maxima_autoridad[0]->ente->rif_organismo.';'.$maxima_autoridad[0]->ente->codigo_rgbp.';'. $maxima_autoridad[0]->ente->fecha_remision_inventario);
		
		Storage::append('public/archivos/ente/autoridad.txt', $maxima_autoridad[0]->ci.';'.$maxima_autoridad[0]->nombre.';'.$maxima_autoridad[0]->apellido.';'.$maxima_autoridad[0]->telefono.';'.$maxima_autoridad[0]->cargo.';'.$maxima_autoridad[0]->correo_electronico.';'.$maxima_autoridad[0]->numero_gaceta.';'.$maxima_autoridad[0]->fecha_gaceta.';'.$maxima_autoridad[0]->numero_resolucion_decreto.';'.$maxima_autoridad[0]->fecha_resolucion_decreto);
	

	return response()->download(storage_path().'/app/public/archivos/ente/autoridad.txt');
    }


    public function datosResponsablePatrimonial(){

		$responsable = Responsable_Patrimonial::all();

		Storage::append('public/archivos/ente/rpatrimonial.txt', $responsable[0]->ente->rif_organismo.';'.$responsable[0]->ente->codigo_rgbp.';'. $responsable[0]->ente->fecha_remision_inventario);
		
		Storage::append('public/archivos/ente/rpatrimonial.txt', $responsable[0]->ci.';'.$responsable[0]->nombre.';'.$responsable[0]->apellido.';'.$responsable[0]->telefono.';'.$responsable[0]->cargo.';'.$responsable[0]->correo_electronico.';'.$responsable[0]->numero_gaceta.';'.$responsable[0]->fecha_gaceta.';'.$responsable[0]->numero_resolucion_decreto.';'.$responsable[0]->fecha_resolucion_decreto);
	

	return response()->download(storage_path().'/app/public/archivos/ente/rpatrimonial.txt');
    }
}
