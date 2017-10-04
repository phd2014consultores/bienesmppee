<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;

class CategoriaController extends Controller
{
    public function create()
    {
        $categorias = Categoria::paginate(10);
        $mensaje = "";
        return view('categoria', compact('mensaje', 'categorias'));
    }

    public function store(Request $request)
    {

        $municipio = Categoria::updateOrCreate(
            ['codigo' => $request['phd-codigo']],

            [
                'categoria' => $request['phd-categoria']
            ]);

        $categorias = Categoria::paginate(10);
        $mensaje = "Categoría agregada satisfactoriamente.";

        return view('categoria', compact('mensaje', 'categorias'));

    }
}
