@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="{{ url('/productos') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="producto_nombre" class="control-label">Nombre</label>
                <input type="text" class="form-control @error('producto_nombre') is-invalid @enderror"
                    name="producto_nombre" id="producto_nombre" value="{{ old('producto_nombre') }}">
                @error('producto_nombre')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="producto_descripcion" class="control-label">Descripción del producto</label>
                <input type="text" class="form-control @error('producto_descripcion') is-invalid @enderror"
                    name="producto_descripcion" id="producto_descripcion" value="{{ old('producto_descripcion') }}">
                @error('producto_descripcion')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="producto_stock" class="control-label">Stock</label>
                <input type="text" class="form-control @error('producto_stock') is-invalid @enderror"
                    name="producto_stock" id="producto_stock" value="{{ old('producto_stock') }}">
                @error('producto_stock')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="producto_valor" class="control-label">Precio</label>
                <input type="text" class="form-control @error('producto_valor') is-invalid @enderror"
                    name="producto_valor" id="producto_valor" value="{{ old('producto_valor') }}">
                @error('producto_valor')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="producto_alto" class="control-label">Alto</label>
                <input type="text" class="form-control @error('producto_alto') is-invalid @enderror" name="producto_alto"
                    id="producto_alto" value="{{ old('producto_alto') }}">
                @error('producto_alto')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="producto_ancho" class="control-label">Ancho</label>
                <input type="text" class="form-control @error('producto_ancho') is-invalid @enderror"
                    name="producto_ancho" id="producto_ancho" value="{{ old('producto_ancho') }}">
                @error('producto_ancho')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="producto_profundidad" class="control-label">profundidad</label>
                <input type="text" class="form-control @error('producto_profundidad') is-invalid @enderror"
                    name="producto_profundidad" id="producto_profundidad" value="{{ old('producto_profundidad') }}">
                @error('producto_profundidad')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="producto_peso" class="control-label">peso</label>
                <input type="text" class="form-control @error('producto_peso') is-invalid @enderror" name="producto_peso"
                    id="producto_peso" value="{{ old('producto_peso') }}">
                @error('producto_peso')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="categoria_id" class="control-label">Categoria</label>
                <select name="categoria_id" id="categoria_id" class="form-control">
                    <option value="">---Selecciona una Opcion---</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria['categoria_id'] }}">{{ $categoria['categoria_nombre'] }}</option>
                    @endforeach
                </select>
            </div>
            <input type="submit" class="btn btn-success" value="Agregar producto">
            <a href="{{ url('productos') }}" class="btn btn-primary">Regresar</a>
        </form>
    </div>
@endsection
