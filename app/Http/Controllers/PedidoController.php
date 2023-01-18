<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\detalle_pedido;
use App\Models\Producto;
use App\Models\Region;
use App\Models\Provincia;
use App\Models\Comuna;
use App\Models\Categoria;
use App\Models\Subcategoria;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    public function generarPedido(){
        //$Region = $this->Regionc();
        $Region = Region::all();
        return view('generarPedido',compact('Region'));    
    }
    
    public function insertarPedido(Request $request){
            $pedido = Pedido::create($request->except(['_token','Region','Comuna']) + ['pedidos_fecha' => Carbon::now()]);
            $pedidoid = $pedido->pedidos_id;
            session(['comuna' => $request->Comuna]);
            session(['region' => $request->Region]);
            session(['pedidoid' => $pedidoid]);
            session(['cliente' => $pedido->pedidos_cliente]);
            session(['serviceValue' => 0]);
            session()->put('productos', [0]);
            return redirect('agregarProducto');
        
    }

    public function agregarProducto(?Request $request){
        if(!session()->has('pedidoid')){
            return view  ('generarPedido');
        }else{
            if($request && $request->has('producto_nombre')) {
                $productos = Producto::where('producto_nombre', 'LIKE', '%' . $request->producto_nombre . '%')->get();
                $productost = Producto::onlyTrashed()
            ->where('producto_nombre', 'LIKE', '%' . $request->producto_nombre . '%')
            ->whereHas('detalle_pedido', function($query) {
                $query->where('pedidos_id', session('pedidoid'));
            })->get();
            $productos = $productost->concat($productos);
            } else {
                $productos = Producto::get();
                $productost = Producto::onlyTrashed()
                ->whereHas('detalle_pedido', function($query) {
                $query->where('pedidos_id', session('pedidoid'));
            })->get();
            $productos = $productost->concat($productos);
            }
            $pedido_id = session('pedidoid');
            $pedido = Pedido::FindorFail($pedido_id);
            $total = $pedido->pedidos_total;
            return view('agregarProducto', compact('productos','total'));
        }
    }
    public function insertarProducto(Request $request)
{
    //generar la session con el id del pedido
    $pedidos_id = session('pedidoid');
    //reducir el stock del producto
    $producto = Producto::FindorFail($request->producto_id);
    $producto->decrement('producto_stock', $request->dt_cantidad);
    $producto->save();
    //crear el detalle pedido o actualizar la cantidad de un pedido que ya contenga el producto
    $d = detalle_pedido::where('pedidos_id',$pedidos_id)->where('producto_id',$request->producto_id)->first();
    if($d){
        $d->increment('dt_cantidad',$request->dt_cantidad);
        $d->increment('dt_subtotal',$request->dt_subtotal);
    }else{
        $detalle_pedido = detalle_pedido::create($request->except(['_token']) + [ 'pedidos_id' => $pedidos_id ]);
    }
    //saber si el producto existe dentro de la session
    $count=0;
    foreach(session('productos') as $pro){
        if($pro==$producto->producto_id){
                $count ++;
        }
    } 
    //si no existe agregarlo a la session
    if($count==0){
        session()->push('productos', $producto->producto_id);
    }
    //hacer soft delete si el producto llega a stock 0
    if($producto->producto_stock==0){
        $producto->delete();
    }
    //actualizar valor total de compra
    $pedido = Pedido::FindorFail($pedidos_id);
    $pedido->increment('pedidos_total', $request->dt_subtotal);
    $pedido->save();
    //actualizar valor de envio
    if($count==0){
        $Comuna = session('comuna');
        $invocador="insertar";
        $this->cotizar($invocador,$Comuna,$producto->producto_valor, $producto->producto_alto,$producto->producto_profundidad,$producto->producto_ancho, 
        $producto->producto_peso);
        
    }
    return redirect('agregarProducto');
}

public function cancelarPedido(){
        $pedidoe = Pedido::where('pedidos_id', session('pedidoid'))->first();
        $pedidoe->delete();
        $detpede = detalle_pedido::where('pedidos_id', session('pedidoid'))->get();
        foreach($detpede as $det){
            $producto = Producto::FindorFail($det->producto_id);
            $producto->increment('producto_stock', $det->dt_cantidad);
            $producto->save();
        }
        $detpede->each->delete();
        
        session()->forget('comuna');
        session()->forget('pedidoid');
        session()->forget('cliente');
        session()->forget('serviceValue');
        session()->forget('productos');
        return redirect('home');
}

public function terminarPedido(){
    session()->forget('comuna');
        session()->forget('cliente');
        session()->forget('pedidoid');
        session()->forget('serviceValue');
        session()->forget('productos');
        return redirect('home');
}


public function verPedidos(){

    $pedidos = Pedido::all();
    return view('verPedidos',compact('pedidos'));
}


public function verPedido($id){
    $pedidos = Pedido::with(['detalle_pedido.productos' => function ($query) {
        $query->withTrashed();
    }])->where('pedidos_id',$id)->first();
    return view('verDpedidos')->with('pedidos',$pedidos);
}


public function eliminarProducto($id){
        $pedido_id = session('pedidoid');
        $detalle_pedido = detalle_pedido::where('pedidos_id', $pedido_id)
        ->where('producto_id', $id)
        ->first();
        $pedido = Pedido::FindorFail($pedido_id);
        if(!is_null($detalle_pedido) && !is_null($pedido)){
            $totala = $pedido->pedidos_total;
            $totaln = $totala - $detalle_pedido->dt_subtotal;
            $pedido->pedidos_total = $totaln;
            $producto = Producto::withTrashed()->FindorFail($id);
            $stocka = $producto->producto_stock ;
            $stockn = $stocka + $detalle_pedido->dt_cantidad;
            $producto->producto_stock = $stockn;
            $invocador="eliminar";
            $Comuna = session('comuna');
            $this->cotizar($invocador,$Comuna,$producto->producto_valor, $producto->producto_alto,$producto->producto_profundidad,$producto->producto_ancho, 
            $producto->producto_peso);
            $producto->save();
            $pedido->save();
            if($stocka==0){
                $producto->restore();
            }
            $detalle_pedido->delete();
        }
    return redirect('agregarProducto');
}

public function cotizar($invocador,$Comuna,$producto_valor,$producto_alto,$producto_profundidad,$producto_ancho,$producto_peso){
    $client = new \GuzzleHttp\Client();
    $response = $client->request('POST', 'https://testservices.wschilexpress.com/rating/api/v1.0/rates/courier', [
        'headers' => [
            'Content-Type' => 'application/json',
            'Cache-Control' => 'no-cache',
            'Ocp-Apim-Subscription-Key' => env('CHILEXPRESS_API_KEY')
        ],
        'json' => [
            "originCountyCode" => "RANC",
            "destinationCountyCode" => $Comuna,
            "package" => [
                'weight' => $producto_peso,
                'height' => $producto_alto,
                'width' => $producto_ancho,
                'length' => $producto_profundidad,
            ],
            "productType" => 3,
            "contentType" => 1,
            "declaredWorth" => $producto_valor,
            "deliveryTime" => 2
        ]
    ]);
    
    $data = json_decode($response->getBody()->getContents());
    if($data->data->courierServiceOptions[0]->additionalServices){
        $precio = $data->data->courierServiceOptions[0]->additionalServices[0]->serviceValue + $data->data->courierServiceOptions[0]->serviceValue;
    }else{
        $precio = $data->data->courierServiceOptions[0]->serviceValue;
    }
    if($invocador=="insertar"){
        session()->increment('serviceValue', $precio);
    }elseif($invocador=="eliminar"){
        session()->decrement('serviceValue', $precio);
    }
    
}
/*
public function Comuna(Request $request){
    if(isset($request->region)){
        $client = new \GuzzleHttp\Client();
    $response = $client->request('GET', 'https://testservices.wschilexpress.com/georeference/api/v1.0/coverage-areas?RegionCode='.$request->region.'&type=0', [
        'headers' => [
            'Content-Type' => 'application/json',
            'Cache-Control' => 'no-cache',
        ]]);
        $data = json_decode($response->getBody()->getContents());
        return response()->json(
            [
                'lista' => $data,
                'success' => true
            ]
        );
    }else{
        return response()->json(
            [
                'success' => false
            ]
        );
    }  
}*/
/*
public function Regionc(){
    $client = new \GuzzleHttp\Client();
    $response = $client->request('GET', 'https://testservices.wschilexpress.com/georeference/api/v1.0/regions', [
        'headers' => [
            'Content-Type' => 'application/json',
            'Cache-Control' => 'no-cache',
        ]
    ]);
    $data = json_decode($response->getBody()->getContents());
    return $data;
}
*/
public function sucursales(Request $request){
    $client = new \GuzzleHttp\Client();
    $response = $client->request('GET', 'https://testservices.wschilexpress.com/georeference/api/v1.0/offices?Type=0&RegionCode='.$request->Region.'&CountyName='.$request->Comuna.'' , [
        'headers' => [
            'Content-Type' => 'application/json',
            'Cache-Control' => 'no-cache',
        ]
    ]);
    $data = json_decode($response->getBody()->getContents());
    return response()->json(
        [
            'lista' => $data,
            'success' => true
        ]
    );
}
public function Comuna(Request $request){
    if(isset($request->region)){
        $data = Comuna::where('region_code',"=" ,$request->region)->get();
        return response()->json(
            [
                'lista' => $data,
                'success' => true
            ]
        );
    }else{
        return response()->json(
            [
                'success' => false
            ]
        );
    }  
}
}
