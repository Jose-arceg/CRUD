<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\SubcategoriaController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/Comuna', [App\Http\Controllers\PedidoController::class,'Comuna']);
Route::GET('/Regionc', [App\Http\Controllers\PedidoController::class,'Regionc']);
Route::any('/sucursales', [App\Http\Controllers\PedidoController::class,'sucursales']);

Route::middleware('CheckLogin')->group(function(){
    Route::get('/generarPedido', [App\Http\Controllers\PedidoController::class,'generarPedido']);
    route::get('/insertarProducto',[App\Http\Controllers\PedidoController::class,'insertarProducto']);
    Route::any('/agregarProducto', [App\Http\Controllers\PedidoController::class,'agregarProducto']);
    route::get('pedidos/{id}/eliminarProducto','App\Http\Controllers\PedidoController@eliminarProducto')->name('pedidos.eliminarProducto');
    route::get('pedidos/{id}/verPedido','App\Http\Controllers\PedidoController@verPedido')->name('pedidos.verPedido');
    Route::any('/insertarPedido', [App\Http\Controllers\PedidoController::class,'insertarPedido']);
    
    
    Route::any('/cotizar', [App\Http\Controllers\PedidoController::class, 'cotizar']);
    Route::any('/verPedidos', [App\Http\Controllers\PedidoController::class,'verPedidos']);
    Route::get('/cancelarPedido', [App\Http\Controllers\PedidoController::class,'cancelarPedido']);
    Route::get('/terminarPedido', [App\Http\Controllers\PedidoController::class,'terminarPedido']);
    
    Route::post('/Producto', [App\Http\Controllers\PedidoController::class,'Producto']);
    Route::post('/actualizarstock',[ProductoController::class,'actualizarstock']);
    Route::put('subcategoria/{id}/restore', 'App\Http\Controllers\SubcategoriaController@restore')->name('subcategoria.restore');
    Route::put('categoria/{id}/restore', 'App\Http\Controllers\CategoriaController@restore')->name('categorias.restore');
    Route::put('producto/{id}/restore', 'App\Http\Controllers\ProductoController@restore')->name('productos.restore');

    route::resource('/productos',ProductoController::class);
    route::resource('/categorias',CategoriaController::class);
    route::resource('/subcategoria',SubcategoriaController::class);
    
});


