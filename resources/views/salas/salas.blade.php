@extends('base')
@section('content')
    <!-- Si NO existes doctores -->
    <div class="container">
        <h1 class="my-5 text-secondary">Salas Medicas</h1>
        <div class="row">
            <div class="col-4">
                <div class="card shadow">
                    <div class="card-body" id="tarjeta">
                        <h4 class="m-3">Crear Nueva Sala</h4>
                        <form action="{{ route('crearSala') }}" method="POST">
                            @csrf
                            <input type="text" name="nombre" id="nombre" onkeyup="validateForm();"
                                placeholder="Nombre de la sala" class="form-control mb-2">
                            <textarea name="descripcion" onkeyup="validateForm();" placeholder="Descripcion de sala..." class="form-control mb-2"
                                id="descripcion" cols="30" rows="3"></textarea>
                            <input type="submit" value="Crear Sala" id="btnSend" class="btn btn-success w-100" disabled>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-4"></div>
            <div class="col-4"></div>
        </div>
        @if ($salas != null)
            <div>
                <h2 class="text-center">Lista de Salas:</h2>
                <div class="container">
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">#ID</th>
                                <th scope="col">Nombre Sala</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($salas as $sala)
                                <tr>
                                    <th scope="row">{{ $sala['idSala'] }}</th>
                                    <td>{{ $sala['nombreSala'] }}</td>
                                    <td>{{ $sala['descripcion'] }}</td>
                                    <td>
                                        <a href="{{route('editarSala')}}" class="btn btn-primary">Editar</a>
                                        <a class="btn btn-danger">Eliminar</a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <h1 class="text-center">No hay salas creadas</h1>
        @endif
        <script>
            function validateForm() {
                var nombre = document.getElementById('nombre');
                var descripcion = document.getElementById('descripcion');
                if (nombre.value.length === 0 || descripcion.value.length === 0) {
                    btnSend.disabled = true;
                } else {
                    btnSend.disabled = false;
                }
            }
        </script>
    </div>
@endsection
