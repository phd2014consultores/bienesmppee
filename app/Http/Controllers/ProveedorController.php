<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proveedor;
use Illuminate\Support\Facades\DB;

class ProveedorController extends Controller
{

    public function create()
    {
        $proveedores = DB::table('proveedors')->paginate(10);
        $mensaje = "";
        return view('proveedor', compact('mensaje', 'proveedores'));
    }

    public function store(Request $request)
    {

        $proveedor = Proveedor::updateOrCreate(
                ['id' => $request['phd-id_proveedor']],

                [
                    'descripcion' => $request['phd-descripcion_proveedor'],
                    'tipo_proveedor' => $request['phd-tipo_proveedor'],
                    'rif'=> $request['phd-rif_proveedor'],
                    'otra_descripcion'=> $request['phd-otra_descripcion_proveedor']
                ]);

        $proveedores = DB::table('proveedors')->paginate(10);
        $mensaje = "Proveedor agregado satisfactoriamente.";

     return view('proveedor', compact('mensaje', 'proveedores'));

 	}
}
