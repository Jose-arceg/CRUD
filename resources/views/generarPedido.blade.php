@extends('layouts.app')

@section('content')

    <body>
        <div class="container">


            @if (session()->has('cliente'))
                <h3>{{__('Hay un pedido sin terminar')}}</h3>
            @else
                <form action="/insertarPedido" method="POST" onsubmit="return validarN()">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="pedidos_cliente" class="control-label">{{__('Nombre del cliente:')}}</label>
                        <input style="width: 400px" type="text" id="pedidos_cliente" name="pedidos_cliente"
                            class="form-control" value="Jose" required>
                    </div>
                    <div class="form-group">
                        <label for="pedidos_direccion" class="control-label">{{__('Direccion:')}}</label>
                        <input style="width: 400px" type="text" id="pedidos_direccion" name="pedidos_direccion"
                            class="form-control" value="Avenida" required>
                    </div>
                    <div class="form-group">
                        <label for="pedidos_numero" class="control-label">{{__('Numero:')}}</label>
                        <input style="width: 400px" type="number" id="pedidos_numero" name="pedidos_numero"
                            class="form-control" placeholder="Ingresar numero(12345678)" value="12345678" required>
                    </div>
                    <div class="form-group">
                        <label for="pedidos_correo" class="control-label">{{__('Correo')}}</label>
                        <input style="width: 400px" type="email" id="pedidos_correo" name="pedidos_correo"
                            class="form-control" value="jose@arce.cl" required>
                    </div>
                    <div class="form-group">
                        <label style="margin-top: 20px" for="_Region" class="control-label">{{__('Region')}}</label>
                        <select name="Region" id="_Region" class="form-control" required>
                            <option value="">---Selecciona una Opcion---</option>
                            @foreach ($Region->regions as $reg)
                                <option value="{{ $reg->regionId }}">{{ $reg->regionName }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label style="margin-top: 20px " for="Comuna" class="control-label">{{__('Comuna')}}</label>
                        <select name="Comuna" id="_Comuna" class="form-control" required>
                        </select>
                    </div>
                    <div class="form-group">
                        <label style="margin-top: 20px " for="Sucursal" class="control-label">{{__('Sucursales')}}</label>
                        <select name="pedidos_sucursal" id="_Sucursal" class="form-control" required>
                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Generar pedido">
                    </div>
                </form>
            @endif
        </div>

        <script>
            const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;

            document.getElementById('_Region').addEventListener('change', (e) => {
                fetch('Comuna', {
                    method: 'POST',
                    body: JSON.stringify({
                        region: e.target.value
                    }),
                    headers: {
                        'Content-Type': 'application/json',
                        "X-CSRF-Token": csrfToken
                    }
                }).then(response => {
                    return response.json()
                }).then(data => {
                    var opciones = "<option value=''> Elegir</option>"
                    
                    for (let i in data.lista.coverageAreas) {
                        opciones += '<option value ="' + data.lista.coverageAreas[i].countyName + '">' + data.lista.coverageAreas[i]
                            .countyName + '</option>';
                    }
                    document.getElementById("_Comuna").innerHTML = opciones;
                }).catch(error => console.error(error));
            })
            document.getElementById('_Comuna').addEventListener('change', (e) => {
                fetch('sucursales', {
                    method: 'POST',
                    body: JSON.stringify({
                        Comuna: e.target.value,
                        Region: document.getElementById('_Region').value 
                    }),
                    headers: {
                        'Content-Type': 'application/json',
                        "X-CSRF-Token": csrfToken
                    }
                }).then(response => {
                    return response.json()
                }).then(data => {
                    var opciones = "<option value=''> Elegir</option>"
                    for (let i in data.lista.offices) {
                        opciones += '<option value ="' + data.lista.offices[i].officeName +
                         '">' + data.lista.offices[i].officeName + '</option>';
                    }
                    document.getElementById("_Sucursal").innerHTML = opciones;
                }).catch(error => console.error(error));
            })
            function validarN() {
                var rut = document.getElementById("Numero").value;

                var regex = /^\d{8}$/;
                if (!regex.test(rut)) {
                    alert("Debe ingresar un numero con el formato correcto");
                    return false;
                } else {
                    return true;
                }
            }
        </script>
    </body>
@endsection
