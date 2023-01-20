<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductoRequest;
use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{

    public function index()
    {
        $productos = Producto::withTrashed()->select(
            'producto_id',
            'producto_nombre',
            'producto_descripcion',
            'producto_stock',
            'producto_valor',
            'productos.deleted_at',
            'categorias.categoria_nombre'
        )
            ->leftJoin('categorias', 'productos.categoria_id', '=', 'categorias.categoria_id')
            ->get();
        return view('productos.index')->with('productos', $productos);
    }

    public function create()
    {
        $categorias = Categoria::select('categoria_id', 'categoria_nombre')->get();
        return view('productos.create')->with('categorias', $categorias);
    }

    public function store(StoreProductoRequest $request)
    {
        $producto = $request->validated();
        Producto::create($producto);
        return redirect('productos')->withSuccess("Producto guardado");
    }

    public function actualizarstock(Request $request)
    {
        $producto = Producto::withTrashed()->where('producto_id', '=', $request->producto_id)->first();
        if ($producto->producto_stock == 0) {
            $producto->restore();
        }
        $producto->increment('producto_stock', $request->cantidad);
        $producto->save();
        return redirect('productos');
    }

    public function show(Producto $producto)
    {
        //
    }

    public function edit(Producto $producto)
    {
        //
    }

    public function update(UpdateProductoRequest $request, Producto $producto)
    {
        //
    }

    public function restore($id)
    {
        $producto = Producto::withTrashed()->where('producto_id', $id)->first();
        $producto->restore();
        return redirect('productos')->withRestored("Producto restaurado con exito");
    }
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect('productos')->withDeleted("Producto Deshabilitado con exito");
    }
}
