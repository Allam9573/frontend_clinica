@extends('base')
@include('includes/sidebar')
@section('content')
    <!-- Si NO existes doctores -->

    <div class="container">
        <h1 class="my-5 text-secondary">Personal Medico</h1>

        <div class="row">
            <div class="col-4">
                <div class="card shadow">
                    <div class="card-body" id="tarjeta">
                        <h4 class="m-3">Crear Nuevo Doctor</h4>
                        <form action="{{ route('crearDoctor') }}" method="POST">
                            @csrf
                            <input type="text" name="nombre" id="nombre" placeholder="Nombre"
                                class="form-control mb-2">
                            <input type="text" name="apellido" onkeyup="validateForm()" id="apellido" placeholder="Apellido"
                                class="form-control mb-2">
                            <select name="especialidad" onkeyup="validateForm()" id="especialidad" class="form-control mb-2">
                                <option value="">Seleccione una especialidad</option>
                                @foreach ($especialidades as $especialidad)
                                    <option value="{{ $especialidad['idEspecialidad'] }}">{{ $especialidad['nombre'] }}
                                    </option>
                                @endforeach
                            </select>
                            <input type="submit" value="Guardar Doctor" id="btnSend" class="btn btn-primary w-100" disabled>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @if ($doctores != null)
        <div>
            <h2 class="text-center">Lista de Doctores:</h2>
            <div class="container">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($doctores as $doctor)
                            <tr>
                                <th scope="row">{{ $doctor['idDoctor'] }}</th>
                                <td>{{ $doctor['nombre'] }}</td>
                                <td>{{ $doctor['apellido'] }}</td>
                                <td>
                                    <a href="{{route('eliminarDoctor', ['id'=>$doctor['idDoctor']])}}" class="btn btn-danger">Eliminar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @else
            <h1 class="text-center mt-5">No hay doctores registrados</h1>
        @endif
    </div>
    <script>
        function validateForm() {
            var nombre = document.getElementById('nombre');
            var apellido = document.getElementById('apellido');
            var btnSend = document.getElementById('btnSend');
            if (nombre.value.length === 0 || apellido.value.length === 0) {
                btnSend.disabled = true;
            } else {
                btnSend.disabled = false;
            }
        }
    </script>
@endsection
