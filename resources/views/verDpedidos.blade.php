@extends('layouts.app')

@section('content')

    <body>
        <div class="container">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>{{__('Cliente')}}</th>
                        <th>{{__('Direccion')}}</th>
                        <th>{{__('Numero')}}</th>
                        <th>{{__('Correo')}}</th>
                        <th>{{__('Estado')}}</th>
                        <th>{{__('Fecha')}}</th>
                        <th>{{__('Total')}}</th>
                        <th>{{__('Sucursal')}}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $pedidos->pedidos_cliente }}</td>
                        <td>{{ $pedidos->pedidos_direccion }}</td>
                        <td>+56 9 {{ $pedidos->pedidos_numero }}</td>
                        <td>{{ $pedidos->pedidos_correo }}</td>
                        <td>{{ $pedidos->pedidos_estado }}</td>
                        <td>{{ $pedidos->pedidos_fecha }}</td>
                        <td>{{ $pedidos->pedidos_total }}</td>
                        <td>{{ $pedidos->pedidos_sucursal }}</td>
                    </tr>
                </tbody>
            </table>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>{{__('Producto')}}</th>
                        <th>{{__('Cantidad')}}</th>
                        <th>{{__('Valor Unitario')}}</th>
                        <th>{{__('Subtotal')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pedidos->detalle_pedido as $detalle)
                        <tr>
                            <td>{{ $detalle->productos->producto_nombre }}</td>
                            <td>{{ $detalle->dt_cantidad }}</td>
                            <td>{{ $detalle->dt_valor }}</td>
                            <td>{{ $detalle->dt_subtotal }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
@endsection
