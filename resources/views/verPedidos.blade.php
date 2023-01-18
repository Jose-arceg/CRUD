@extends('layouts.app')

@section('content')

    <body>
        <div class="container">
            <table class="table table-hover">
                <thead>
                    <th>
                        {{ __('Cliente') }}
                    </th>
                    <th>
                        {{ __('Direccion') }}
                    </th>
                    <th>
                        {{ __('Numero') }}
                    </th>
                    <th>
                        {{ 'Correo' }}
                    </th>
                    <th>
                        {{ __('Estado') }}
                    </th>
                    <th>
                        {{ __('Fecha') }}
                    </th>
                    <th>
                        {{ __('Total') }}
                    </th>
                    <th>
                        {{ __('Sucursal') }}
                    </th>
                    <th>
                        {{ __('Acciones') }}
                    </th>
                </thead>
                <tbody>
                    @foreach ($pedidos as $item)
                        <tr>
                            <td>
                                <span>{{ $item->pedidos_cliente }}</span>
                            </td>
                            <td>
                                <span>{{ $item->pedidos_direccion }}</span>
                            </td>
                            <td>
                                <span>+56 9 {{ $item->pedidos_numero }}</span>
                            </td>
                            <td>
                                <span>{{ $item->pedidos_correo }}</span>
                            </td>
                            <td>
                                <span>{{ $item->pedidos_estado }}</span>
                            </td>
                            <td>
                                <span>{{ date('d-m-Y', strtotime($item->pedidos_fecha)) }}</span>
                            </td>
                            <td>
                                <span>${{ number_format($item->pedidos_total, 0, '', '.') }}</span>
                            </td>
                            <td>
                                <span>{{ $item->pedidos_sucursal }}</span>
                            </td>
                            <td>
                                <a href="{{ url('/pedidos/' . $item->pedidos_id . '/verPedido') }}"
                                    class="btn btn-info">{{ __('Verdetalles') }}</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </body>
@endsection
