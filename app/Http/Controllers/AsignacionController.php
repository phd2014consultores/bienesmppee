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

class AsignacionController extends Controller
{

	 public function cargarBienes()
    {
     	$bien= Bien::select('*')
                             ->where('responsable_id', '=', null)
                             ->get();    
		$ubicacion = Ubicacion_Administrativa::all();
		$pais = Pais::all();
		$parroquia = Parroquia::all();
		$sede = Sede::all();
        $mensaje = "";

     return view('asignar', compact('bien','ubicacion','pais','parroquia','sede','mensaje'));
 	}


 	public function actualizarBien(Request $request)
    {


     	$bien= Bien::find($request['idBienSeleccionado']);
    	if($bien->tipo_bien->tipo_bien == "Mueble") {


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

        if ($bien->tipo_bien->tipo_bien == "Inmueble") {

        	$pais = Pais::select('*')
                            ->where('pais', '=', $request['phd-asignacion_pais'])
                            ->get(); 
            $sede = Sede::select('*')
            				->where('sede', '=', $request['phd-asignacion_sede'] )
            				->get();
            $parroquia = Parroquia::select('*')
            				->where('parroquia', '=', $request['phd-asignacion_parroquia'])
                            ->get(); 

        	$ubicacion = Ubicacion_Geografica::create(
                [
                	'ubicacion'=> $request['phd-asignacion_ubicacion'],
                	'pais'=> $pais[0]->id,
                	'localizacion'=> $request['phd-asignacion_localizacion'],
                	'parroquia'=> $parroquia[0]->id,
                	'calle_avenida'=> $request['phd-asignacion_calle_av'],
                	'urbanizacion'=> $request['phd-asignacion_urbanizacion'],
                	'casa_edificio'=> $request['phd-asignacion_casa_edificio'],
                	'posee_sede'=> $request['phd-asignacion_posee_sede'],
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
        $mensaje = "Bien asignado satisfactoriamente.";

     return view('asignar', compact('bien','ubicacion','pais','parroquia','sede','mensaje'));

 	}

        public function lapor1(){
        return view('incorporar');
        }
        //Method 2
        public function lapor2(){
        return view('asignar');
        }

        public function lapor3(){
        return view('reasignar');
        }

        public function lapor4(){
        return view('desincorporar');
        }

        public function lapor5(){
        return view('tablero');
        }

        public function lapor6(){
        return view('archivos');
        }
}
