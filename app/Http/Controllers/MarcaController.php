<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Marca;
use Illuminate\Support\Facades\DB;

class MarcaController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $marcas = DB::table('marcas')->paginate(10);
        $mensaje = "";
        return view('marca', compact('mensaje', 'marcas'));
    }

    public function store(Request $request)
    {

        $data = array('codigo' => $request['phd-codigo'],'denominacion_comercial' => $request['phd-denominacion_comercial'],'nombre_fabricante' => $request['phd-nombre_fabricante']);
        if ($request['phd-it_to_update']) {
            $marca = Marca::updateOrCreate(
                ['id' => $request['phd-it_to_update']],
                $data);
        } else {
            $marca = Marca::create($data);
        }

        $marcas = DB::table('marcas')->paginate(10);
   		$mensaje = "Marca agregada satisfactoriamente.";

        return view('marca', compact('mensaje', 'marcas'));

 	}
}


