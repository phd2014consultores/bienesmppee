<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subcategoria;
use App\Categoria;

class SubcategoriaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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
            ->where('nombre', '=', $request['phd-categoria'])
            ->get();

        $data = array('codigo' => $request['phd-codigo'],'nombre' => $request['phd-subcategoria'],'categoria_id' => $categoria[0]->id);

        if ($request['phd-it_to_update']) {
            $subcategoria = Subcategoria::updateOrCreate(
                ['id' => $request['phd-it_to_update']],
                $data);
        } else {
            $subcategoria = Subcategoria::create($data);
        }


        $subcategorias = Subcategoria::paginate(10);
        $categorias = Categoria::all();
        $mensaje = "Subcategoría agregada satisfactoriamente.";

        return view('subcategoria', compact('mensaje', 'subcategorias', 'categorias'));

    }
}
