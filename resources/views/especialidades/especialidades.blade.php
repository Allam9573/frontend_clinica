@extends('base')
@section('content')
    <div class="container">
        <h1 class="my-5">Lista de Especialidades</h1>
        <div class="row mb-5">
            <div class="col-4">
                <div class="card shadow">
                    <div class="card-body" id="tarjeta">
                        <h4 class="m-3">Crear Nueva Especialidad</h4>
                        <form action="{{ route('crearEspecialidad') }}" method="POST">
                            @csrf
                            <input type="text" name="nombre" id="nombre" placeholder="Nombre de la especialidad"
                                class="form-control mb-3" onkeyup="validateForm();">
                            <input type="submit" id="btnSend" value="Guardar Especialidad" class="btn btn-primary w-100 mb-2" disabled>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @if ($especialidades != null)
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#ID</th>
                        <th scope="col">Nombre Especialidad</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($especialidades as $especialidad)
                        <tr>
                            <th scope="row">{{ $especialidad['idEspecialidad'] }}</th>
                            <td>{{ $especialidad['nombre'] }}</td>
                            <td>
                                <a href="{{route('editarEspecialidad', ['id'=>$especialidad['idEspecialidad']])}}" class="btn btn-primary">Editar</a>
                                <a href="" class="btn btn-danger">Eliminar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <h2 class="text-center">No hay especialidades creadas</h2>
        @endif

    </div>
    <script>
        function validateForm() {
            var nombre = document.getElementById('nombre');
            if (nombre.value.length === 0) {
                btnSend.disabled = true;
            } else {
                btnSend.disabled = false;
            }
        }
    </script>
@endsection
