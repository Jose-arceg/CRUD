@extends('layouts.app')

@section('content')

    <body>
        <div class="container">
            <div class="buscador">
                <form action="/productos" class="d-flex" role="search" method="GET">
                    <input name="producto_nombre" class="form-control search-box" type="search" placeholder=""
                        aria-label="Search" value="">
                    <button class="btn btn-success" style="background-color: #82D9D0; border: red;"
                        type="submit">Buscar</button>
                </form>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>
                            Nombre
                        </th>
                        <th>
                            Descripcion
                        </th>
                        <th>
                            stock
                        </th>
                        <th>
                            valor
                        </th>
                        <th>
                            Categoria
                        </th>
                        <th>
                            Eliminar/Restaurar
                        </th>
                        <th>
                            Agregar stock
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productos as $p)
                        <tr>
                            <td>
                                {{ $p->producto_nombre }}
                            </td>
                            <td>
                                {{ $p->producto_descripcion }}
                            </td>
                            <td>
                                {{ $p->producto_stock }}
                            </td>
                            <td>
                                ${{ number_format($p->producto_valor, 0, '', '.') }}
                            </td>
                            <td>
                                {{ $p->categoria->categoria_nombre }}
                            </td>
                            <td>
                                @if (!$p->deleted_at)
                                    <form method="POST" action="{{ url(route('productos.destroy', $p->producto_id)) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <input type="submit" class="btn btn-danger" value="Eliminar producto">
                                    </form>
                                @else
                                    <form method="POST" action="{{ url(route('productos.restore', $p->producto_id)) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('PUT') }}
                                        <input type="submit" class="btn btn-success" value="Restaurar producto">
                                    </form>
                                @endif
                            </td>
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#Modal{{ $p->producto_id }}">
                                    Agregar stock
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="Modal{{ $p->producto_id }}" tabindex="-1"
                                    aria-labelledby="ModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="ModalLabel">Agregar stock</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/actualizarstock" method="POST">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="Cantidad"
                                                            class="control-label">{{ 'Stock a agregar' }}</label>
                                                        <input type="hidden" name="producto_id"
                                                            value="{{ $p->productoId }}">
                                                        <input type="number" name="cantidad" id="cantidad">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Cerrar</button>
                                                        <button type="submit" class="btn btn-success">Argegar
                                                            stock</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
@endsection
