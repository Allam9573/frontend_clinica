@extends('base')



<!-- Si NO existes doctores -->
<div class="container">
    <h1 class="my-5 text-secondary">Pacientes</h1>


    <div class="row">
        <div class="col-4">
            <div class="card shadow">
                <div class="card-body" id="tarjeta">
                    <h4 class="m-3">Crear Nuevo Paciente</h4>
                    <form action="{{ route('crearPaciente') }}" method="POST">
                        @csrf
                        <input type="text" name="nombre" id="nombre" placeholder="Nombre"
                            class="form-control mb-2" onkeyup="validateForm();">
                        <input type="text" name="apellido" id="apellido" placeholder="Apellido"
                            class="form-control mb-2" onkeyup="validateForm();">
                        <input type="text" name="direccion" id="direccion" placeholder="Direccion"
                            class="form-control mb-2" onkeyup="validateForm();">
                        <input type="text" name="telefono" id="telefono" placeholder="Telefono"
                            class="form-control mb-2" onkeyup="validateForm();">
                        <input type="submit" id="btnSend" value="Guardar Paciente" class="btn btn-success w-100"
                            disabled>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Si hay doctores -->
    @if ($pacientes != null)
        <div>
            <h2 class="text-center">Listado de Pacientes:</h2>
            <div class="container">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Direccion</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Fecha Registro</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pacientes as $paciente)
                            <tr>
                                <th scope="row">{{ $paciente['idPaciente'] }}</th>
                                <td>{{ $paciente['nombre'] }}</td>
                                <td>{{ $paciente['apellido'] }}</td>
                                <td>{{ $paciente['direccion'] }}</td>
                                <td>{{ $paciente['telefono'] }}</td>
                                <td>{{ $paciente['fechaCreacion'] }}</td>
                                <td>
                                    <a href="{{route('editarPaciente')}}" class="btn btn-primary">Editar</a>
                                    <a class="btn btn-danger">Eliminar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <h1 class="text-center mt-5">No hay pacientes registrados.</h1>
    @endif
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
</div>
