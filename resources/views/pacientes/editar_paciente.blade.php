@extends('base')
@section('content')
    <div class="container">
        <h1 class="my-5 text-secondary">Editar Paciente:</h1>
        <div class="row">
            <div class="col-4">
                <div class="card shadow">
                    <div class="card-body" id="tarjeta">
                        <h4 class="m-3">Editar Informacion</h4>
                        <form action="{{ route('actualizarPaciente', ['id' => $paciente['idPaciente']]) }}" method="POST">
                            @csrf
                            <input type="text" name="nombre" id="nombre" placeholder="Nombre"
                                value="{{ $paciente['nombre'] }}" class="form-control mb-2" onkeyup="validateForm();">
                            <input type="text" name="apellido" id="apellido" placeholder="Apellido"
                                class="form-control mb-2" onkeyup="validateForm();" value="{{ $paciente['apellido'] }}">
                            <input type="text" name="direccion" id="direccion" placeholder="Direccion"
                                class="form-control mb-2" onkeyup="validateForm();" value="{{ $paciente['direccion'] }}">
                            <input type="text" name="telefono" id="telefono" placeholder="Telefono"
                                class="form-control mb-2" onkeyup="validateForm();" value="{{ $paciente['telefono'] }}">
                            <input type="submit" id="btnSend" value="Actualizar Paciente" class="btn btn-success w-100">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function validateForm() {
            var nombre = document.getElementById('nombre');
            var apellido = document.getElementById('apellido');
            var direccion = document.getElementById('direccion');
            var telefono = document.getElementById('telefono');
            var btnSend = document.getElementById('btnSend');
            if (nombre.value.length === 0 || apellido.value.length === 0 || direccion.value.length === 0 || telefono.value
                .length === 0) {
                btnSend.disabled = true;
            } else {
                btnSend.disabled = false;
            }
        }
    </script>
@endsection
