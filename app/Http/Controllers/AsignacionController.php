<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tipo_Bien;
use App\Categoria;
use App\Subcategoria;
use App\Categoria_Especifica;
use App\Estado_Bien;
use App\Bien;
use App\Ubicacion_Administrativa;
use App\Datos_Especificos_Asignacion;
use App\Ubicacion_Geografica;
use App\Pais;
use App\Parroquia;
use App\Sede;
use App\Unidades_Administrativas;

class AsignacionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
     	$bien= Bien::select('*')
                             ->where('responsable_id', '=', null)
                             ->get();    
		$ubicacion = Ubicacion_Administrativa::all();
		$pais = Pais::all();
		$parroquia = Parroquia::all();
		$sede = Sede::all();
        $unidades = Unidades_Administrativas::all();
        $mensaje = "";

     return view('asignar', compact('bien','ubicacion','pais','parroquia','sede','mensaje','unidades'));
 	}


 	public function store(Request $request)
    {


     	$bien= Bien::find($request['idBienSeleccionado']);
    	if($bien->tipo_bien->nombre == "Mueble") {


    		$ubicacion = Ubicacion_Administrativa::select('*')
                            ->where('ubicacion', '=', $request['phd-asignacion_mueble_ubicacion'])
                            ->get(); 
            $ubicacion_geografica =null;

    		$datos_especificos_asignacion = Datos_Especificos_Asignacion::create(
                [  
              
                    'unidad_administrativa' => $request['phd-asignacion_mueble_unidad_administrativa'],
                    'responsable_administrativo' => $request['phd-asignacion_mueble_responsable_administrativo'],
                    'responsable_uso_directo'=> $request['phd-asignacion_mueble_responsable_uso_directo'],
                    'ubicacion_administrativa_id' => $ubicacion[0]->id,
                    'ubicacion_geografica_id'=>$ubicacion_geografica,
                    
                ]);
     		
        }

        if ($bien->tipo_bien->nombre == "Inmueble") {

            $sede = Sede::select('*')
                ->where('descripcion', '=', $request['phd-asignacion_sede'] )
                ->get();
        	$ubicacion = Ubicacion_Geografica::create(
                [
                	'ubicacion'=> $sede[0]->ciudad->ciudad,
                	'pais'=> $sede[0]->codigo_pais,
                	'localizacion'=> $sede[0]->localizacion,
                	'parroquia'=> $sede[0]->parroquia->parroquia,
                	'calle_avenida'=> $sede[0]->calle_avenida,
                	'urbanizacion'=> $sede[0]->urbanizacion,
                	'casa_edificio'=> $sede[0]->casa_edificio,
                	'posee_sede'=> 'SI',
                	'sede'=> $sede[0]->id,

                ]);

        	$ubicacion_administrativa = null;

            $datos_especificos_asignacion = Datos_Especificos_Asignacion::create(
                [  
              
                    'unidad_administrativa' => $request['phd-asignacion_inmueble_unidad_administrativa'],
                    'responsable_administrativo' => $request['phd-asignacion_inmueble_responsable_administrativo'],
                    'responsable_uso_directo'=> $request['phd-asignacion_inmueble_responsable_uso_directo'],
                    'ubicacion_administrativa_id' => $ubicacion_administrativa,
                    'ubicacion_geografica_id'=> $ubicacion->id,
                    
                ]);

        }
        
        $bien->responsable_id= $datos_especificos_asignacion->id;
     	$bien->save();   


    $bien= Bien::select('*')
                             ->where('responsable_id', '=', null)
                             ->get();    
        $ubicacion = Ubicacion_Administrativa::all();
        $pais = Pais::all();
        $parroquia = Parroquia::all();
        $sede = Sede::all();
        $unidades = Unidades_Administrativas::all();
        $mensaje = "Bien asignado satisfactoriamente.";

     return view('asignar', compact('bien','ubicacion','pais','parroquia','sede','mensaje','unidades'));

 	}
}
