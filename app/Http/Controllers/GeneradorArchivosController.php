<?php

namespace App\Http\Controllers;

use App\Bien;
use App\FA_Compra_Abierto_Cerrado;
use App\FormaAdquisicion;
use App\Proveedor;
use App\Unidades_Administrativas;
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
        $fecha = $date['mday'].$date['mon'].$date['year'];

		Storage::append($dir, $ente[0]->rif.';'.$ente[0]->codigo_rgbp. ';' . $fecha);
		
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
        $fecha = $date['mday'].$date['mon'].$date['year'];

		Storage::append($dir, $maxima_autoridad[0]->ente->rif.';'.$maxima_autoridad[0]->ente->codigo_rgbp.';'.$fecha);
		
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
        $fecha = $date['mday'].$date['mon'].$date['year'];
		Storage::append($dir, $responsable[0]->ente->rif.';'.$responsable[0]->ente->codigo_rgbp.';'.$fecha);
		
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


        $date = getdate();

        $dateFrom = ($request['phd-dateFrom']) ?
            DateTime::createFromFormat('j/m/Y', $request['phd-dateFrom']) :
            DateTime::createFromFormat('j/m/Y', '01/01/0001');

        $dateTo = ($request['phd-dateTo']) ?
            DateTime::createFromFormat('j/m/Y', $request['phd-dateTo']) :
            DateTime::createFromFormat('j/m/Y', $date['mday'].'/'.$date['mon'].'/'.$date['year']);


		$sede = Sede::where('created_at', '>=', $dateFrom)
            ->where('updated_at','<=',$dateTo)->get();

		$dir = 'public/archivos/sedes/'.(($date['0'] < 0) ? ($date['0'] * -1) : $date['0']).'/sedes.txt';



        if (count($sede) > 0) {
            $ente = $sede[0]->ente;
            $fecha = $date['mday'].$date['mon'].$date['year'];
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

    public function datosUnidadesAdministrativas(Request $request){


        $date = getdate();

        $dateFrom = ($request['phd-dateFrom']) ?
            DateTime::createFromFormat('j/m/Y', $request['phd-dateFrom']) :
            DateTime::createFromFormat('j/m/Y', '01/01/0001');

        $dateTo = ($request['phd-dateTo']) ?
            DateTime::createFromFormat('j/m/Y', $request['phd-dateTo']) :
            DateTime::createFromFormat('j/m/Y', $date['mday'].'/'.$date['mon'].'/'.$date['year']);


        $unidades = Unidades_Administrativas::where('created_at', '>=', $dateFrom)
            ->where('updated_at','<=',$dateTo)->get();
        $ente = Ente::where('habilitado','=', true)->get();

        $dir = 'public/archivos/unidades/'.(($date['0'] < 0) ? ($date['0'] * -1) : $date['0']).'/unidades.txt';



        if (count($unidades) > 0) {
            $fecha = $date['mday'].$date['mon'].$date['year'];
            Storage::append($dir, $ente[0]->rif.';'.$ente[0]->codigo_rgbp.';'.$fecha);

            for ($i = 0; $i < count($unidades); ++$i) {
                Storage::append($dir,
                    $unidades[$i]->codigo . ';' .
                    $unidades[$i]->descripcion . ';' .
                    $unidades[$i]->codigo_categoria . ';' .
                    $unidades[$i]->denominacion . ';' .
                    $unidades[$i]->codigo_unidad_adscrita);
            }
        }

        return response()->download(storage_path().'/app/'.$dir);

    }

    public function datosProveedores(Request $request){


        $date = getdate();

        $dateFrom = ($request['phd-dateFrom']) ?
            DateTime::createFromFormat('j/m/Y', $request['phd-dateFrom']) :
            DateTime::createFromFormat('j/m/Y', '01/01/0001');

        $dateTo = ($request['phd-dateTo']) ?
            DateTime::createFromFormat('j/m/Y', $request['phd-dateTo']) :
            DateTime::createFromFormat('j/m/Y', $date['mday'].'/'.$date['mon'].'/'.$date['year']);


        $proveedores = Proveedor::where('created_at', '>=', $dateFrom)
            ->where('updated_at','<=',$dateTo)->get();
        $ente = Ente::where('habilitado','=', true)->get();

        $dir = 'public/archivos/proveedores/'.(($date['0'] < 0) ? ($date['0'] * -1) : $date['0']).'/proveedores.txt';



        if (count($proveedores) > 0) {
            $fecha = $date['mday'].$date['mon'].$date['year'];
            Storage::append($dir, $ente[0]->rif.';'.$ente[0]->codigo_rgbp.';'.$fecha);

            for ($i = 0; $i < count($proveedores); ++$i) {
                Storage::append($dir,
                    $proveedores[$i]->id . ';' .
                    $proveedores[$i]->descripcion . ';' .
                    $proveedores[$i]->tipo_proveedor . ';' .
                    $proveedores[$i]->rif . ';' .
                    $proveedores[$i]->otra_descripcion
                    );
            }
        }

        return response()->download(storage_path().'/app/'.$dir);

    }

    public function datosformasAdquisicionA(Request $request){


        $date = getdate();

        $dateFrom = ($request['phd-dateFrom']) ?
            DateTime::createFromFormat('j/m/Y', $request['phd-dateFrom']) :
            DateTime::createFromFormat('j/m/Y', '01/01/0001');

        $dateTo = ($request['phd-dateTo']) ?
            DateTime::createFromFormat('j/m/Y', $request['phd-dateTo']) :
            DateTime::createFromFormat('j/m/Y', $date['mday'].'/'.$date['mon'].'/'.$date['year']);

        $formas_adquisicion = FA_Compra_Abierto_Cerrado::where('created_at', '>=', $dateFrom)
            ->where('updated_at','<=',$dateTo)->get();

        $ente = Ente::where('habilitado','=', true)->get();

        $dir = 'public/archivos/origenes/'.(($date['0'] < 0) ? ($date['0'] * -1) : $date['0']).'/origenesa.txt';



        if (count($formas_adquisicion) > 0) {
            $fecha = $date['mday'].$date['mon'].$date['year'];
            Storage::append($dir, $ente[0]->rif.';'.$ente[0]->codigo_rgbp.';'.$fecha);

            for ($i = 0; $i < count($formas_adquisicion); ++$i) {
                Storage::append($dir,
                    $formas_adquisicion[$i]->id . ';' .
                    $formas_adquisicion[$i]->id . ';' .
                    $formas_adquisicion[$i]->nombre_concurso . ';' .
                    $formas_adquisicion[$i]->numero_concurso . ';' .
                    $formas_adquisicion[$i]->fecha_concurso
                );
            }
        }

        return response()->download(storage_path().'/app/'.$dir);

    }

}
