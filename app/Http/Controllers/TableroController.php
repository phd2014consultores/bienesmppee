<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bien;

class TableroController extends Controller
{
    	 public function cargarBienes()
    {
     	$bien= Bien::all();
                          

     return view('tablero', compact('bien'));
 	}
}
