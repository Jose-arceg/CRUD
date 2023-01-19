<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreProductoRequest;
use App\Http\Resources\ProductoResource;
use App\Http\Resources\ProductoCollection;
use App\Http\Resources\CategoriaResource;
use App\Http\Resources\CategoriaCollection;


class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = new ProductoCollection(Producto::withTrashed()->with('Categoria')->get());
        return view('productos.index')->with('productos', $productos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = new CategoriaCollection(Categoria::all());
        return view ('productos.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductoRequest $request)
    {
        $producto = $request->validated();
        Producto::create($producto);
        return redirect('productos');
    }

    public function actualizarstock(Request $request){
        $producto = Producto::withTrashed()->where('producto_id','=',$request->producto_id)
        ->first();
        if($producto->producto_stock==0){
            $producto->restore();
        }
        $producto->increment('producto_stock', $request->cantidad);
        $producto->save();
        return redirect('productos');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        return new ProductoResource($producto);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductoRequest  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductoRequest $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $producto = Producto::withTrashed()->findOrFail($id);
        $producto->restore();
        return redirect('productos');
    }
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect('productos');
    }
}