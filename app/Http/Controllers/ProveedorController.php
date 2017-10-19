<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proveedor;
use Illuminate\Support\Facades\DB;

class ProveedorController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $proveedores = DB::table('proveedors')->paginate(10);
        $mensaje = "";
        return view('proveedor', compact('mensaje', 'proveedores'));
    }

    public function store(Request $request)
    {

        $data = array('descripcion' => $request['phd-descripcion_proveedor'],
            'tipo_proveedor' => $request['phd-tipo_proveedor'],
            'nombre' => $request['phd-categoria'],
            'rif' => $request['phd-rif_proveedor'],
            'otra_descripcion' => $request['phd-otra_descripcion_proveedor']);
        if ($request['phd-it_to_update']) {
            $proveedor = Proveedor::updateOrCreate(
                ['id' => $request['phd-it_to_update']],
                $data);
        } else {
            $proveedor = Proveedor::create($data);
        }

        $proveedores = DB::table('proveedors')->paginate(10);
        $mensaje = "Proveedor agregado satisfactoriamente.";

     return view('proveedor', compact('mensaje', 'proveedores'));

 	}
}
