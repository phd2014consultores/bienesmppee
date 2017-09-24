<?php

namespace App\Http\Controllers;

use App\Tipo_Bien;
use App\Forma_Adquisicion;
use App\Categoria;
use App\Subcategoria;
use App\Categoria_Especifica;
use App\Estado_Bien;
use App\Estado_Uso_Bien;
use App\Uso_Actual_Bien;
use App\Moneda;
use App\Color;
use App\Modelo;
use App\Marca;
use App\Unidad_Medida;
use App\Compañia_Aseguradora;
use App\Cobertura;
use App\Proveedor;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IncorporarController extends Controller
{
      public function cargarBienes()
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



}









