@extends('layouts.app')

@section('content')

    <body>
        <div class="container">
            @include('mensajes.subcategorias')
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>
                            {{__('Nombre')}}
                        </th>
                        <th>
                            {{__('Descripcion')}}
                        </th>
                        <th>
                            {{__('Categoria')}}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subcategorias as $sc)
                        <tr>
                            <td>
                                {{ $sc->sc_nombre }}
                            </td>
                            <td>
                                {{ $sc->sc_descripcion }}
                            </td>
                            <td>
                                {{ $sc->categoria->categoria_nombre }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
@endsection
