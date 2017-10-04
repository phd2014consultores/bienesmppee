<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subcategoria;
use App\Categoria;

class SubcategoriaController extends Controller
{
    public function create()
    {
        $subcategorias = Subcategoria::paginate(10);
        $categorias = Categoria::all();
        $mensaje = "";
        return view('subcategoria', compact('mensaje', 'subcategorias', 'categorias'));
    }

    public function store(Request $request)
    {
        $categoria = Categoria::select('*')
            ->where('categoria', '=', $request['phd-categoria'])
            ->get();

        $ciudad = Subcategoria::updateOrCreate(
            ['codigo' => $request['phd-codigo']],

            [
                'subcategoria' => $request['phd-subcategoria'],
                'categoria_id' => $categoria[0]->id,
            ]);


        $subcategorias = Subcategoria::paginate(10);
        $categorias = Categoria::all();
        $mensaje = "Subcategoría agregada satisfactoriamente.";

        return view('subcategoria', compact('mensaje', 'subcategorias', 'categorias'));

    }
}
