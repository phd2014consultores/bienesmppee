<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoriaEspecifica;
use App\Subcategoria;
use App\Categoria;

class CategoriaEspecificaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $categorias_especificas = CategoriaEspecifica::paginate(10);
        $categorias = Categoria::all();
        $mensaje = "";
        return view('categoria_especifica', compact('mensaje', 'categorias_especificas', 'categorias'));
    }

    public function store(Request $request)
    {
        $subcategoria = Subcategoria::select('*')
            ->where('nombre', '=', $request['phd-categoria_subcategorias'])
            ->get();


        $data = array('codigo' => $request['phd-codigo'],'nombre' => $request['phd-categoria_especifica'],'subcategoria_id' => $subcategoria[0]->id);

        if ($request['phd-it_to_update']) {
            $categoria_especifica = CategoriaEspecifica::updateOrCreate(
                ['id' => $request['phd-it_to_update']],
                $data);
        } else {
            $categoria_especifica = CategoriaEspecifica::create($data);
        }

        $categorias_especificas = CategoriaEspecifica::paginate(10);
        $categorias = Categoria::all();
        $mensaje = "Categoría Específica agregada satisfactoriamente.";

        return view('categoria_especifica', compact('mensaje', 'categorias_especificas', 'categorias'));

    }
}
