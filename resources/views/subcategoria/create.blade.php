@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="{{ url('/subcategoria') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="sc_nombre" class="control-label">{{__('Nombre')}}</label>
                <input type="text" class="form-control" name="sc_nombre" id="sc_nombre" value="">
            </div>
            <div class="form-group">
                <label for="sc_descripcion" class="control-label">{{__('Descripción')}}</label>
                <input type="text" class="form-control" name="sc_descripcion" id="sc_descripcion" value="">
            </div>
            <div class="form-group">
                <label for="categoria_id" class="control-label">{{__('Categoria')}}</label>
                <select name="categoria_id" id="categoria_id" class="form-control">
                    <option value="">---Selecciona una Opcion---</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria['categoria_id'] }}">{{ $categoria['categoria_nombre'] }}</option>
                    @endforeach
                </select>
            </div>
            <input type="submit" class="btn btn-success" value="Agregar Subcategoria">
            <a href="{{ url('subcategoria') }}" class="btn btn-primary">{{__('Regresar')}}</a>
        </form>
    </div>
@endsection
