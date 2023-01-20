@extends('layouts.app')

@section('content')

    <body>

        <div class="container">
            @if (session()->has('pedido'))
                <h3>
                    {{ __('Cliente:') }} {{ session()->get('pedido')->pedidos_cliente }}
                </h3>
                <h4>
                    {{ __('Total: $') }} {{ number_format($total, 0, '', '.') }}
                </h4>
                @if (session()->has('serviceValue'))
                    <h4>
                        {{ __('Valor aproximado de envio por Chilexpress: $') }}{{ number_format(session('serviceValue'), 0, '', '.') }}
                    </h4>
                @endif
                <div class="buscador">
                        <input name="producto_nombre" id="buscador" class="form-control search-box" type="search" placeholder=""
                            aria-label="Search" value="">
                </div>
                <br>
                <a href="{{ url('/cancelarPedido') }}" style="width: 150px"
                    class="btn btn-danger">{{ __('Cancelar pedido') }}</a>
                <a href="{{ url('/terminarPedido') }}" style="width: 150px"
                    class="btn btn-success">{{ __('Terminar pedido') }}</a>
                <table class="table table-hover">
                    <thead>
                        <th>{{ __('Producto') }}</th>
                        <th>{{ __('Descripcion') }}</th>
                        <th>{{ __('Valor') }}</th>
                        <th>{{ __('stock') }}</th>
                        <th>{{ __('Cantidad') }}</th>
                        <th>{{ __('subtotal') }}</th>
                        <th>{{ __('Acciones') }}</th>
                    </thead>
                    <tbody id="buscar">
                        @foreach ($productos as $producto)
                            <form action="{{route('insertarProducto')}}">
                                @csrf
                                <tr>
                                    <td>
                                        <span name="nombre" id="nombre"
                                            class="form-control">{{ $producto->producto_nombre }} </span>
                                    </td>
                                    <td>
                                        <span name="descripcion" id="descripcion"
                                            class="form-control">{{ $producto->producto_descripcion }} </span>
                                    </td>
                                    <td>
                                        <span name="valor" id="valor-{{ $producto->producto_id }}"
                                            class="form-control">${{ number_format($producto->producto_valor, 0, '', '.') }}</span>
                                    </td>
                                    <td>
                                        <span name="stock" id="stock-{{ $producto->producto_id }}"
                                            class="form-control">{{ $producto->producto_stock }}</span>
                                    </td>
                                    <td>
                                        <input type="number" min="1" max="{{ $producto->producto_stock }}"
                                            name="dt_cantidad" id="cantidad-{{ $producto->producto_id }}"
                                            onchange="calcularSubtotal({{ $producto->producto_id }})" class="form-control"
                                            required>
                                    </td>
                                    <td>
                                        <span name="subtotal" style="width: 130px; height:36px"
                                            id="subtotal-{{ $producto->producto_id }}" class="form-control"></span>
                                    </td>
                                    <td>
                                        <input type="hidden" name="dt_valor" id="valori-{{ $producto->producto_id }}"
                                            class="form-control" value="{{ $producto->producto_valor }}">
                                        <input type="hidden" name="dt_subtotal"
                                            id="subtotali-{{ $producto->producto_id }}">
                                        <input type="hidden" name="producto_id" id="producto_id"
                                            value="{{ $producto->producto_id }}">
                                        @if (!$producto->deleted_at)
                                            <button type="submit"
                                                class="btn btn-success">{{ __('Agregar producto') }}</button>
                                            <a href="{{ url('/pedidos/' . $producto->producto_id . '/eliminarProducto') }}"
                                                class="btn btn-danger">{{ __('Eliminar producto') }}</a>
                                        @else
                                            <a href="{{ url('/pedidos/' . $producto->producto_id . '/eliminarProducto') }}"
                                                class="btn btn-danger">{{ __('Eliminar producto') }}</a>
                                        @endif
                                    </td>
                                </tr>
                            </form>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h3>No se ha generado ningun pedido</h3>
            @endif
        </div>
    </body>
    <script>
        function calcularSubtotal(producto_id) {
            var cantidad = document.getElementById('cantidad-' + producto_id).value;
            var valor = document.getElementById('valor-' + producto_id).innerHTML;
            valor = valor.replace("$", "");
            valor = valor.replace(".", "");
            var subtotal = cantidad * valor;
            document.getElementById('valori-' + producto_id).value = valor;
            document.getElementById('subtotali-' + producto_id).value = subtotal;
            document.getElementById('subtotal-' + producto_id).innerHTML = ("$" + subtotal.toLocaleString('es'));
        }
        $(document).ready(function() {
            $("#buscador").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                    $("#buscar tr").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
            });
        });
    </script>
@endsection
<style>
    .buscador {
        max-width: 400px;
    }
</style>
