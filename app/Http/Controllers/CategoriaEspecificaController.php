<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria_Especifica;
use App\Subcategoria;
use App\Categoria;

class CategoriaEspecificaController extends Controller
{
    public function create()
    {
        $categorias_especificas = Categoria_Especifica::paginate(10);
        $categorias = Categoria::all();
        $mensaje = "";
        return view('categoria_especifica', compact('mensaje', 'categorias_especificas', 'categorias'));
    }

    public function store(Request $request)
    {
        $subcategoria = Subcategoria::select('*')
            ->where('subcategoria', '=', $request['phd-categoria_subcategorias'])
            ->get();

        $categoria_especifica = Categoria_Especifica::updateOrCreate(
            ['codigo' => $request['phd-codigo']],

            [
                'categoria_especifica' => $request['phd-categoria_especifica'],
                'subcategoria_id' => $subcategoria[0]->id,
            ]);

        $categorias_especificas = Categoria_Especifica::paginate(10);
        $categorias = Categoria::all();
        $mensaje = "Categoría Específica agregada satisfactoriamente.";

        return view('categoria_especifica', compact('mensaje', 'categorias_especificas', 'categorias'));

    }
}
