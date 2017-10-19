<?php

namespace App\Http\Controllers;

use Storage;
use Illuminate\Http\Request;
use App\Ente;
use App\Maxima_Autoridad;
use App\Responsable_Patrimonial;
use App\Sede;
use \Datetime;

class GeneradorArchivosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function datosBasicos(){

		$ente = Ente::select("*")->where("habilitado", "=", true)->get();
		$date = getdate();
		$dir = 'public/archivos/ente/'.(($date['0'] < 0) ? ($date['0'] * -1) : $date['0']).'/basicos.txt';
		Storage::append($dir, $ente[0]->rif.';'.$ente[0]->codigo_rgbp. ';' . $date);
		
		Storage::append(
		    $dir,
            $ente[0]->codigo_sicegof.';'
            .$ente[0]->siglas.';'
            .$ente[0]->rif.';'
            .$ente[0]->razon_social.';'
            .$ente[0]->telefono.';'
            .$ente[0]->direccion_web.';'
            .$ente[0]->correo_electronico.';'
            .$ente[0]->fecha_gaceta.';'
            .$ente[0]->numero_gaceta);
	

	    return response()->download(storage_path().'/app/'.$dir);
    }


    public function datosMaximaAutoridad(){

		$maxima_autoridad = Maxima_Autoridad::select("*")->where("habilitado", "=", true)->get();
        $date = getdate();
        $dir = 'public/archivos/maxima_autoridad/'.(($date['0'] < 0) ? ($date['0'] * -1) : $date['0']).'/autoridad.txt';

		Storage::append($dir, $maxima_autoridad[0]->ente->rif.';'.$maxima_autoridad[0]->ente->codigo_rgbp.';'.$date);
		
		Storage::append(
		    $dir,
            $maxima_autoridad[0]->ci.';'
            .$maxima_autoridad[0]->nombre.';'
            .$maxima_autoridad[0]->apellido.';'
            .$maxima_autoridad[0]->telefono.';'
            .$maxima_autoridad[0]->cargo.';'
            .$maxima_autoridad[0]->correo_electronico.';'
            .$maxima_autoridad[0]->numero_gaceta.';'
            .$maxima_autoridad[0]->fecha_gaceta.';'
            .$maxima_autoridad[0]->numero_resolucion_decreto.';'
            .$maxima_autoridad[0]->fecha_resolucion_decreto);


        return response()->download(storage_path().'/app/'.$dir);
    }


    public function datosResponsablePatrimonial(){

		$responsable = Responsable_Patrimonial::select("*")->where("habilitado", "=", true)->get();
        $date = getdate();
        $dir = 'public/archivos/responsable_patrimonial/'.(($date['0'] < 0) ? ($date['0'] * -1) : $date['0']).'/rpatrimonial.txt';

		Storage::append($dir, $responsable[0]->ente->rif.';'.$responsable[0]->ente->codigo_rgbp.';'.$date);
		
		Storage::append(
		    $dir,
            $responsable[0]->ci.';'
            .$responsable[0]->nombre.';'
            .$responsable[0]->apellido.';'
            .$responsable[0]->telefono.';'
            .$responsable[0]->cargo.';'
            .$responsable[0]->correo_electronico.';'
            .$responsable[0]->numero_gaceta.';'
            .$responsable[0]->fecha_gaceta.';'
            .$responsable[0]->numero_resolucion_decreto.';'
            .$responsable[0]->fecha_resolucion_decreto);


        return response()->download(storage_path().'/app/'.$dir);
    }


     public function datosSede(Request $request){

        $dateFrom = DateTime::createFromFormat('j/m/Y', $request['phd-dateFrom']);
        $dateTo = DateTime::createFromFormat('j/m/Y', $request['phd-dateTo']);


		$sede = Sede::where('created_at', '>=', $dateFrom)
            ->where('updated_at','<=',$dateTo)->get();
		$date = getdate();
		$dir = 'public/archivos/sedes/'.(($date['0'] < 0) ? ($date['0'] * -1) : $date['0']).'/sedes.txt';



        if (count($sede) > 0) {
            $ente = $sede[0]->ente;
            $fecha = $date['mday'].'/'.$date['mon'].'/'.$date['year'];
            Storage::append($dir, "$ente->rif;$ente->codigo_rgbp;$fecha");

            for ($i = 0; $i < count($sede); ++$i) {
                Storage::append($dir, $sede[$i]->codigo.';'.
                    $sede[$i]->tipo_id.';'.
                    $sede[$i]->especificacion_tipo_sede.';'.
                    $sede[$i]->descripcion.';'.
                    $sede[$i]->localizacion.';'.
                    $sede[$i]->codigo_pais.';'.
                    (($sede[$i]->especifique_otro_pais==NULL)? 'noaplica' :$sede[$i]->especifique_otro_pais).';'.
                    $sede[$i]->parroquia_id.';'.$sede[$i]->ciudad_id.';'.
                    (($sede[$i]->nombre_otra_ciudad==NULL)? 'noaplica' : '$sede[$i]->nombre_otra_ciudad').';'.
                    $sede[$i]->urbanizacion.';'.
                    $sede[$i]->calle_avenida.';'.
                    $sede[$i]->casa_edificio.';'.
                    $sede[$i]->piso);
            }
        }

         return response()->download(storage_path().'/app/'.$dir);

     }
}
