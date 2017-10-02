<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\FA_Adju_Conf_Expr;
use App\Forma_Adquisicion;
use App\FA_Compra_Abierto_Cerrado;
use App\FA_Compra_Directa;
use App\FA_Dacion_Pago;
use App\FA_Donacion;
use App\FA_Permuta;
use App\FA_Transferencia;
use App\Tipo_Bien;
use App\Mueble;
use App\Marca;
use App\Modelo;
use App\Color;
use App\Inmueble;
use App\Unidad_Medida;
use App\Compañia_Aseguradora;
use App\Cobertura;
use App\Datos_Seguro;
use App\Componentes_Mueble;
use App\Estado_Bien;
use App\Estado_Uso_Bien;
use App\Uso_Actual_Bien;
use App\Moneda;
use App\Categoria;
use App\Subcategoria;
use App\Categoria_Especifica;
use App\Bien;
use App\Proveedor;



class BienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipo_bien = Tipo_Bien::all();
        $forma_adquisicion = Forma_Adquisicion::all();
        $categoria = Categoria::all();
        $subcategoria = Subcategoria::all();
        $categoria_especifica = Categoria_Especifica::all();
        $estado_bien = Estado_Bien::all();
        $estado_uso = Estado_Uso_Bien::all();
        $uso_actual = Uso_Actual_Bien::all();
        $moneda = Moneda::all();
        $color = Color::all();
        $marca = Marca::all();
        $modelo = Modelo::all();
        $unidad = Unidad_Medida::all();
        $compañia_aseguradora = Compañia_Aseguradora::all();
        $cobertura = Cobertura::all();
        $proveedor = Proveedor::all();

        $mensaje = "";

        return view('incorporar', compact('tipo_bien', 'forma_adquisicion','categoria','subcategoria', 'categoria_especifica', 'estado_bien', 'estado_uso','uso_actual','moneda','color','marca','modelo','unidad','compañia_aseguradora','cobertura', 'proveedor','mensaje'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $forna_adquisicion = Forma_Adquisicion::select('*')
                             ->where('forma_adquisicion', '=', $request['phd-forma_adqusicion'])
                             ->get();


        $fa_adj_conf_expr = new FA_Adju_Conf_Expr();
        if ($forna_adquisicion[0]->forma_adquisicion == "Adjudicación" || $forna_adquisicion[0]->forma_adquisicion == "Confiscación" || $forna_adquisicion[0]->forma_adquisicion == "Expropiación"  ){   

                $fa_adj_conf_expr = FA_Adju_Conf_Expr::create(
                [  
                    'beneficiario' => $request['phd-fa_adju_conf_expr_beneficiario'],
                    'propietario' => $request['phd-fa_adju_conf_expr_propietario'],
                    'autoridad' => $request['phd-fa_adju_conf_expr_autoridad'],
                    'numero_sentencia'=> $request['phd-fa_adju_conf_expr_num_sentencia'],
                    'fecha_sentencia'=>str_replace("/", "", $request['phd-fa_adju_conf_expr_fecha_sentencia']),
                    'nombre_registro'=>$request['phd-fa_adju_conf_expr_nombre_registro'],
                    'tomo'=>$request['phd-fa_adju_conf_expr_tomo'],
                    'folio'=>$request['phd-fa_adju_conf_expr_folio'],
                    'fecha_registro'=>str_replace("/", "", $request['phd-fa_adju_conf_expr_fecha_registro']),
                    'forma_adquisicion_id'=>$forna_adquisicion[0]->id
                ]);
        //return $fa_adj_conf_expr;
       }


       $fa_compra_abierto_cerrado = new FA_Compra_Abierto_Cerrado();
        if ($forna_adquisicion[0]->forma_adquisicion == "Compra concurso abierto" || $forna_adquisicion[0]->forma_adquisicion == "Compra concurso cerrado" ){   

                $fa_compra_abierto_cerrado = FA_Compra_Abierto_Cerrado::create(
                [  
                    'numero_concurso' => $request['phd-fa_concurso_abierto_cerrado_numero_concurso'],
                    'nombre_concurso' => $request['phd-fa_concurso_abierto_cerrado_nombre_concurso'],
                    'fecha_concurso' => str_replace("/", "",$request['phd-fa_concurso_abierto_cerrado_fecha_concurso']),
                    'numero_contrato'=> $request['phd-fa_concurso_abierto_cerrado_num_contrato'],
                    'fecha_contrato'=>str_replace("/", "", $request['phd-fa_concurso_abierto_cerrado_fecha_contrato']),
                    'numero_nota_entrega'=>$request['phd-fa_concurso_abierto_cerrado_num_nota_entrega'],
                    'fecha_nota_entrega'=> str_replace("/", "",$request['phd-fa_concurso_abierto_cerrado_fecha_nota_entrega']),
                    'numero_factura'=>$request['phd-fa_concurso_abierto_cerrado_num_factura'],
                    'fecha_factura'=>str_replace("/", "", $request['phd-fa_concurso_abierto_cerrado_fecha_factura']),
                    'forma_adquisicion_id'=>$forna_adquisicion[0]->id
                ]);
        //return $fa_adj_conf_expr;
       }

       $fa_compra_directa = new FA_Compra_Directa();
       if ($forna_adquisicion[0]->forma_adquisicion == "Compra directa"){   

                $fa_compra_directa = FA_Compra_Directa::create(
                [  
                    'proveedor' => $request['phd-fa_compra_directaproveedor'],
                    'numero_orden_compra' => $request['phd-fa_compra_directa_num_orden_compra'],
                    'fecha_orden_compra' => str_replace("/", "",$request['phd-fa_compra_directa_fecha_orden_compra']),
                    'numero_nota_entrega'=> $request['phd-fa_compra_directa_num_nota_entrega'],
                    'fecha_nota_entrega'=>str_replace("/", "", $request['phd-fa_compra_directa_fecha_nota_entrega']),
                    'numero_factura'=>$request['phd-fa_compra_directa_num_factura'],
                    'fecha_factura'=> str_replace("/", "",$request['phd-fa_compra_directa_fecha_factura']),
                    'forma_adquisicion_id'=>$forna_adquisicion[0]->id
                ]);
        //return $fa_adj_conf_expr;
       }

       $fa_dacion_pago = new FA_Dacion_Pago();
       if ($forna_adquisicion[0]->forma_adquisicion == "Dación de pago"){   

                $fa_dacion_pago = FA_Dacion_Pago::create(
                [  
                    'nombre_cedente' => $request['phd-fa_dacion_pago_nombre_cedente'],
                    'nombre_beneficiario' => $request['phd-fa_dacion_pago_nombre_beneficiario'],
                    'numero_finiquito' => $request['phd-fa_dacion_pago_num_finiquito'],
                    'fecha_finiquito'=> str_replace("/", "",$request['phd-fa_dacion_pago_fecha_finiquito']),
                    'nombre_registro'=> $request['phd-fa_dacion_pago_nombre_registro'],
                    'tomo'=>$request['phd-fa_dacion_pago_tomo'],
                    'folio'=>$request['phd-fa_dacion_pago_folio'],
                    'fecha_registro'=> str_replace("/", "",$request['phd-fa_dacion_pago_fecha_registro']),
                    'forma_adquisicion_id'=>$forna_adquisicion[0]->id
                ]);
        //return $fa_adj_conf_expr;
       }

        $fa_donacion = new FA_Donacion();
        if ($forna_adquisicion[0]->forma_adquisicion == "Donación"){   

                $fa_donacion = FA_Donacion::create(
                [  
                    'nombre_donante' => $request['phd-fa_donacion_nombre_donante'],
                    'nombre_beneficiario' => $request['phd-fa_donacion_nombre_beneficiario'],
                    'numero_contrato' => $request['phd-fa_donacion_num_contrato'],
                    'fecha_contrato'=> str_replace("/", "",$request['phd-fa_donacion_fecha_contrato']),
                    'nombre_registro'=> $request['phd-fa_donacion_nombre_registro'],
                    'tomo'=>$request['phd-fa_donacion_tomo'],
                    'folio'=>$request['phd-fa_donacion_folio'],
                    'fecha_registro'=> str_replace("/", "",$request['phd-fa_donacion_fecha_registro']),
                    'forma_adquisicion_id'=>$forna_adquisicion[0]->id
                ]);
        //return $fa_adj_conf_expr;
       }

       $fa_permuta = new FA_Permuta();
       if ($forna_adquisicion[0]->forma_adquisicion == "Permuta"){   

                $fa_permuta = FA_Permuta::create(
                [  
                    'nombre_copermutante' => $request['phd-fa_permuta_nombre_copermutante'],
                    'nombre_beneficiario' => $request['phd-fa_permuta_nombre_beneficiario'],
                    'nombre_licitacion' => $request['phd-fa_permuta_nombre_licitacion'],
                    'numero_licitacion' => $request['phd-fa_permuta_num_licitacion'],
                    'fecha_licitacion'=> str_replace("/", "",$request['phd-fa_permuta_fecha_licitacion']),
                    'numero_contrato' => $request['phd-fa_permuta_num_contrato'],
                    'fecha_contrato'=> str_replace("/", "",$request['phd-fa_permuta_fecha_contrato']),
                    'nombre_registro'=> $request['phd-fa_permuta_nombre_registro'],
                    'tomo'=>$request['phd-fa_permuta_tomo'],
                    'folio'=>$request['phd-fa_permuta_folio'],
                    'fecha_registro'=> str_replace("/", "",$request['phd-fa_permuta_fecha_registro']),
                    'forma_adquisicion_id'=>$forna_adquisicion[0]->id
                ]);
        //return $fa_adj_conf_expr;
       }

       $fa_transferencia = new FA_Transferencia();
        if ($forna_adquisicion[0]->forma_adquisicion == "Transferencia"){   

                $fa_transferencia = FA_Transferencia::create(
                [  
                    'nombre_quien_transfiere' => $request['phd-fa_transferencia_nombre_quien_transfiere'],
                    'nombre_beneficiario' => $request['phd-fa_transferencia_nombre_beneficiario'],
                    'numero_autorizacion' => $request['phd-fa_transferencia_num_autorizacion'],
                    'fecha_autorizacion'=> str_replace("/", "",$request['phd-fa_transferencia_fecha_autorizacion']),
                    'nombre_registro'=> $request['phd-fa_transferencia_nombre_registro'],
                    'tomo'=>$request['phd-fa_transferencia_tomo'],
                    'folio'=>$request['phd-fa_transferencia_folio'],
                    'fecha_registro'=> str_replace("/", "",$request['phd-fa_transferencia_fecha_registro']),
                    'forma_adquisicion_id'=>$forna_adquisicion[0]->id
                ]);
        //return $fa_adj_conf_expr;
       }



       $tipo_bien = Tipo_Bien::select('*')
                             ->where('tipo_bien', '=', $request['phd-tipo_bien'])
                             ->get();


        $mueble = new Mueble();
       if($tipo_bien[0]->tipo_bien == "Mueble"){

        $marca = Marca::select('*')
                             ->where('marca', '=', $request['phd-datos_particulares_mueble_marca'])
                             ->get();     

        $modelo = Modelo::select('*')
                             ->where('modelo', '=', $request['phd-datos_particulares_mueble_modelo'])
                             ->get();    

        $color = Color::select('*')
                             ->where('color', '=', $request['phd-datos_particulares_mueble_color'])
                             ->get();            

                $mueble = Mueble::create(
                [  
                    'serial' => $request['phd-datos_particulares_mueble_serial'],
                    'marca_id' => $marca[0]->id,
                    'modelo_id' => $modelo[0]->id,
                    'color_id'=> $color[0]->id,
                    'ano_fabricacion' => str_replace("/", "",$request['phd-datos_particulares_mueble_anio_fabricacion']),
                    'especificaciones_tecnicas'=> $request['phd-bien_datos_particulares_mueble_especificaciones_tecnicas'],
                    'otras_especificaciones_tecnicas'=>$request['phd-bien_datos_particulares_mueble_otras_especificaciones_tecnicas'],
                ]);


                  if($request['datos_particulares_mueble_componente_size'] > 0){
                    
                     for ($i = 0; $i < $request['datos_particulares_mueble_componente_size']; $i++){
                          
                          $componente = Componentes_Mueble::create(
                          [  
                            'id' => $request['datos_particulares_mueble_componente_'.$i.'_codigo'],
                            'marca' => $request['datos_particulares_mueble_componente_'.$i.'_marca'],
                            'modelo' => $request['datos_particulares_mueble_componente_'.$i.'_modelo'],
                            'serial' => $request['datos_particulares_mueble_componente_'.$i.'_serial'],
                            'tipo'=> $request['datos_particulares_mueble_componente_'.$i.'_tipo'],
                            'descripcion' =>$request['datos_particulares_mueble_componente_'.$i.'_descripcion'],
                            'mueble_id'=> $request['datos_particulares_mueble_serial'],
                    
                          ]);
               

                     }
        
              
            }
        }
       
        $inmueble = new Inmueble();


       if($tipo_bien[0]->tipo_bien == "Inmueble"){
         $unidad_medida_area_construccion = Unidad_Medida::select('*')
                            ->where('unidad', '=', $request['phd-datos_particulares_inmueble_unidad_medida_area_construccion'])
                            ->get();  

         $unidad_medida_area_terreno = Unidad_Medida::select('*')
                            ->where('unidad', '=', $request['phd-datos_particulares_inmueble_unidad_medida_area_terreno'])
                            ->get();  
                $inmueble = Inmueble::create(
                [  
                    'oficina_registro_notaria' => $request['phd-datos_particulares_inmueble_oficina_registro_notaria'],
                    'referencia_registro' => $request['phd-datos_particulares_inmueble_referencia_registro'],
                    'numero_registro' => $request['phd-datos_particulares_inmueble_numero_registro'],
                    'tomo'=> $request['phd-datos_particulares_inmueble_tomo'],
                    'folio' => $request['phd-datos_particulares_inmueble_folio'],
                    'protocolo'=> $request['phd-datos_particulares_inmueble_protocolo'],
                    'fecha_registro'=>str_replace("/", "",$request['phd-datos_particulares_inmueble_fecha_registro']),
                    'nombre_propietario_anterior'=>$request['phd-datos_particulares_inmueble_nombre_propietario_anterior'],
                    'area_construccion'=>$request['phd-datos_particulares_inmueble_area_construccion'],
                    'unidad_medida_area_construccion'=>$unidad_medida_area_construccion[0]->id,
                    'area_terreno'=>$request['phd-datos_particulares_inmueble_area_terreno'],
                    'unidad_medida_area_terreno'=>$unidad_medida_area_terreno[0]->id,
                    'dependencias_integran'=>$request['phd-datos_particulares_inmueble_dependencias_integran'],
                    'otras_especificaciones'=>$request['phd-datos_particulares_inmueble_otras_especificaciones'],
                ]);

        }


        $nombre_compania = Compañia_Aseguradora::select('*')
                            ->where('nombre', '=', $request['phd-datos_seguro_nombre_compania'])
                            ->get();  

        $cobertura = Cobertura::select('*')
                            ->where('cobertura', '=', $request['phd-datos_seguro_cobertura'])
                            ->get();  

                $datos_seguro = Datos_Seguro::create(
                [  
                    'registro_seguro' => $request['phd-datos_seguro_registro_seguro'],
                    'compania_id' => $nombre_compania[0]->id,
                    'numero_poliza' => $request['phd-datos_seguro_numero_poliza'],
                    'monto_asegurado'=> $request['phd-datos_seguro_monto_asegurado'],
                    'cobertura_id' => $cobertura[0]->id,
                    'posee_responsabilidad_civil'=> $request['phd-datos_seguro_posee_responsabilidad_civil'],
                    'fecha_inicio_poliza'=>str_replace("/", "",$request['phd-datos_seguro_fecha_inicio_poliza']),
                    'fecha_fin_poliza'=>str_replace("/", "",$request['phd-datos_seguro_fecha_fin_poliza']),
                    'otro_nombre_compania'=>$request['phd-datos_seguro_otro_nombre_compania'],
                    'descripcion_cobertura'=>$request['phd-datos_seguro_descripcion_cobertura'],
                    
                ]);

        $estado = Estado_Bien::select('*')
                            ->where('estado', '=', $request['phd-estado'])
                            ->get();  
        $estado_uso = Estado_Uso_Bien::select('*')
                            ->where('estado_uso', '=', $request['phd-estado_uso'])
                            ->get();  
        $uso_actual = Uso_Actual_Bien::select('*')
                            ->where('uso_actual', '=', $request['phd-uso_actual'])
                            ->get();
        $moneda = Moneda::select('*')
                            ->where('moneda', '=', $request['phd-moneda'])
                            ->get(); 
        $categoria = Categoria::select('*')
                            ->where('categoria', '=', $request['phd-categoria'])
                            ->get(); 
       $subcategoria = Subcategoria::select('*')
                            ->where('subcategoria', '=', $request['phd-subcategoria'])
                            ->get(); 
    $categoria_especifica = Categoria_Especifica::select('*')
                            ->where('categoria_especifica', '=', $request['phd-categoria_especifica'])
                            ->get();                                       

        if($moneda[0]->moneda == 'Otra Moneda')
        {
            $otra_moneda = $request['phd-otra_moneda'];
        }else
        {
            $otra_moneda = $request['phd-moneda'];
        }

        $responsable_id= null;
        $true = true;
                $bien = Bien::create(
                [  
                    'id' => $request['phd-codigo_interno'],
                    'valor_adquisicion' => $request['phd-valor_adquisicion'],
                    'fecha_adquisicion' => str_replace("/", "",$request['phd-fecha_adquisicion']),
                    'fecha_ingreso_organo'=> str_replace("/", "",$request['phd-fecha_ingreso_organo']),
                    'descripcion_estado' => $request['phd-descripcion_estado'],
                    'tipo_bien_id'=> $tipo_bien[0]->id,
                    'inmueble_id'=> $inmueble->id,
                    'mueble_id'=>$mueble->id,
                    'forma_adquisicion_id'=>$forna_adquisicion[0]->id,
                    'fa_adju_conf_expr_id'=>$fa_adj_conf_expr->id,
                    'fa_compra_abierto_cerrado_id'=>$fa_compra_abierto_cerrado->id,
                    'fa_compra_directa_id'=>$fa_compra_directa->id,
                    'fa_dacion_pago_id'=>$fa_dacion_pago->id,
                    'fa_donacion_id'=>$fa_donacion->id,
                    'fa_permuta_id'=>$fa_permuta->id,
                    'fa_transfecia_id'=>$fa_transferencia->id,
                    'categoria_id'=>$categoria[0]->id,
                    'subcategoria_id'=>$subcategoria[0]->id,
                    'categoria_especifica_id'=>$categoria_especifica[0]->id,
                    'datos_seguro_id'=>$datos_seguro->id,
                    'moneda_id'=>$moneda[0]->id,
                    'otra_moneda'=>$otra_moneda,
                    'estado_bien_id'=>$estado[0]->id,
                    'estado_uso_id'=>$estado_uso[0]->id,
                    'uso_actual_id'=>$uso_actual[0]->id,
                    'responsable_id' => $responsable_id,
                    'habilitado'=>$true,
                    
                ]);
                
 


        $tipo_bien = Tipo_Bien::all();  
        $forma_adquisicion = Forma_Adquisicion::all();
        $categoria = Categoria::all();
        $subcategoria = Subcategoria::all();
        $categoria_especifica = Categoria_Especifica::all();
        $estado_bien = Estado_Bien::all();
        $estado_uso = Estado_Uso_Bien::all();
        $uso_actual = Uso_Actual_Bien::all();
        $moneda = Moneda::all();
        $color = Color::all();
        $marca = Marca::all();
        $modelo = Modelo::all();
        $unidad = Unidad_Medida::all();
        $compañia_aseguradora = Compañia_Aseguradora::all();
        $cobertura = Cobertura::all();
        $proveedor = Proveedor::all();

        $mensaje = "Bien incorporado satisfactoriamente.";
        
        return view('incorporar', compact('tipo_bien', 'forma_adquisicion','categoria','subcategoria', 'categoria_especifica', 'estado_bien', 'estado_uso','uso_actual','moneda','color','marca','modelo','unidad','compañia_aseguradora','cobertura', 'proveedor', 'mensaje'));
       
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
