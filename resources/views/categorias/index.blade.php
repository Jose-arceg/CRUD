@extends('layouts.app')

@section('content')
<body>
    <div class="container">
        @include('mensajes.categorias')
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>
                        {{__('Nombre')}}
                    </th>
                    <th>
                        {{__('Descripcion')}}
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categorias as $c)
                <tr> 
                    <td>
                        {{$c->categoria_nombre}}  
                    </td>
                    <td>
                        {{$c->categoria_descripcion}}  
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
@endsection