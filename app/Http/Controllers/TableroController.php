<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bien;

class TableroController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $bien = Bien::paginate(10);
        return view('tablero', compact('bien'));
 	}
}
