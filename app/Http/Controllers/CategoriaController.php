<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;

class CategoriaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $categorias = Categoria::paginate(10);
        $mensaje = "";
        return view('categoria', compact('mensaje', 'categorias'));
    }

    public function store(Request $request)
    {

        $data = array('codigo' => $request['phd-codigo'],'nombre' => $request['phd-categoria']);
        if ($request['phd-it_to_update']) {
            $categoria = Categoria::updateOrCreate(
                ['id' => $request['phd-it_to_update']],
                $data);
        } else {
            $categoria = Categoria::create($data);
        }

        $categorias = Categoria::paginate(10);
        $mensaje = "Categoría agregada satisfactoriamente.";

        return view('categoria', compact('mensaje', 'categorias'));

    }
}
