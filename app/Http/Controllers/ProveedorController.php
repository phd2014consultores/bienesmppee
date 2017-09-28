<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proveedor;

class ProveedorController extends Controller
{

     public function cargarmensaje()
    {
       
        $mensaje = "";

     return view('proveedor', compact('mensaje'));
    }

    public function agregarProveedor(Request $request)
    {

   		$proveedor = Proveedor::create(
                [  
                    'id' => $request['phd-id_proveedor'],
                    'descripcion' => $request['phd-descripcion_proveedor'],
                    'tipo_proveedor' => $request['phd-tipo_proveedor'],
                    'rif'=> $request['phd-rif_proveedor'],
                    'otra_descripcion'=> $request['phd-otra_descripcion_proveedor']
                ]);

         $mensaje = "Proveedor agregado satisfactoriamente.";

     return view('proveedor', compact('mensaje'));

 	}
}
