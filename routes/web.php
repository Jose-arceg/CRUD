<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\SubcategoriaController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::post('/Comuna', [PedidoController::class,'Comuna']);
Route::GET('/Regionc', [PedidoController::class,'Regionc']);
Route::any('/sucursales', [PedidoController::class,'sucursales']);

Route::middleware('CheckLogin')->group(function(){
    Route::get('/generarPedido', [PedidoController::class,'generarPedido']);
    route::get('/insertarProducto',[PedidoController::class,'insertarProducto'])->name('insertarProducto');
    Route::any('/agregarProducto', [PedidoController::class,'agregarProducto']);
    route::get('pedidos/{id}/eliminarProducto',[PedidoController::class,'eliminarProducto'])->name('pedidos.eliminarProducto');
    route::get('pedidos/{id}/verPedido',[PedidoController::class,'verPedido'])->name('pedidos.verPedido');
    Route::any('/insertarPedido', [PedidoController::class,'insertarPedido'])->name('insertarPedido');
    
    Route::any('/verPedidos', [PedidoController::class,'verPedidos']);
    Route::get('/cancelarPedido', [PedidoController::class,'cancelarPedido']);
    Route::get('/terminarPedido', [PedidoController::class,'terminarPedido']);
    
    Route::post('/Producto', [PedidoController::class,'Producto']);
    Route::post('/actualizarstock',[ProductoController::class,'actualizarstock']);
    Route::put('subcategoria/{id}/restore', [SubcategoriaController::class ,'restore'])->name('subcategoria.restore');
    Route::put('categoria/{id}/restore', [CategoriaController::class, 'restore'])->name('categorias.restore');
    Route::put('producto/{id}/restore', [ProductoController::class, 'restore'])->name('productos.restore');

    route::resource('/productos',ProductoController::class);
    route::resource('/categorias',CategoriaController::class);
    route::resource('/subcategoria',SubcategoriaController::class);
    
});


