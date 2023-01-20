@extends('layouts.app')
@section('content')

    <body>
        <div class="container">
            <form action="{{ url('/categorias') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="categoria_nombre" class="control-label">{{ __('Nombre') }}</label>
                    <input type="text" class="form-control @error('categoria_nombre') is-invalid @enderror"
                        name="categoria_nombre" id="categoria_nombre" value="{{ old('categoria_nombre') }}">
                    @error('categoria_nombre')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="categoria_descripcion" class="control-label">{{ __('Descripción') }}</label>
                    <input type="text" class="form-control @error('categoria_descripcion') is-invalid @enderror"
                        name="categoria_descripcion" id="categoria_descripcion" value="{{ old('categoria_descripcion') }}">
                    @error('categoria_descripcion')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <input type="submit" class="btn btn-success" value="Agregar Categoria">
                <a href="{{ url('categorias') }}" class="btn btn-primary">{{ __('Regresar') }}</a>
            </form>
        </div>
    </body>
@endsection
