<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bien;
use Illuminate\Support\Facades\DB;

class TableroController extends Controller
{
    public function index()
    {
        $bien = DB::table('biens')->paginate(10);
        return view('tablero', compact('bien'));
 	}
}
