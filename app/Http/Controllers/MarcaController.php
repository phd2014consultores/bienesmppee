<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Marca;
use Illuminate\Support\Facades\DB;

class MarcaController extends Controller
{
    
    public function create()
    {
        $marcas = DB::table('marcas')->paginate(10);
        $mensaje = "";
        return view('marca', compact('mensaje', 'marcas'));
    }

    public function store(Request $request)
    {


   		$marca = Marca::updateOrCreate(
   		        ['codigo'=> $request['phd-codigo']],
                [
                    'denominacion_comercial' => $request['phd-denominacion_comercial'],
                    'nombre_fabricante' => $request['phd-nombre_fabricante'],
                ]);

        $marcas = DB::table('marcas')->paginate(10);
   		$mensaje = "Marca agregada satisfactoriamente.";

        return view('marca', compact('mensaje', 'marcas'));

 	}
}


