<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubCategoriaRequest;
use App\Models\Categoria;
use App\Models\Subcategoria;

class SubcategoriaController extends Controller
{
    public function index()
    {
        $subcategorias = Subcategoria::withTrashed()->with('categoria')->get();
        return view('subcategoria.index')->with('subcategorias', $subcategorias);
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('subcategoria.create', compact('categorias'));
    }

    public function store(StoreSubCategoriaRequest $request)
    {
        Subcategoria::create($request->validated());
        return redirect('subcategoria');
    }

    public function show(Subcategoria $subcategoria)
    {
        //
    }

    public function edit(Subcategoria $subcategoria)
    {
        //
    }

    public function update(UpdateSubcategoriaRequest $request, Subcategoria $subcategoria)
    {
        //
    }

    public function restore($id)
    {
        $subcategoria = Subcategoria::withTrashed()->findOrFail($id);
        $subcategoria->restore();
        return redirect('subcategoria');
    }
    public function destroy(Subcategoria $subcategoria)
    {
        $subcategoria->delete();
        return redirect('subcategoria');
    }
}
