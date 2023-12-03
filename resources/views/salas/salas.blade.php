@extends('base')
@section('content')
    <!-- Si NO existes doctores -->
    <div class="container">
        <h1 class="my-5">Salas Medicas</h1>
        <div class="row">
            <div class="col-4">
                <div class="card shadow">
                    <div class="card-body" id="tarjeta">
                        <h4 class="m-3">Crear Nueva Sala</h4>
                        <form action="{{ route('crearSala') }}" method="POST">
                            @csrf
                            <input type="text" name="nombre" id="" placeholder="Nombre de la sala"
                                class="form-control mb-2">
                            <textarea name="descripcion" placeholder="Descripcion de sala..." class="form-control mb-2" id=""
                                cols="30" rows="3"></textarea>
                            <input type="submit" value="Crear Sala" class="btn btn-success w-100">
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
                                        <a class="btn btn-primary">Ver Mas</a>
                                        <a class="btn btn-danger">Eliminar</a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <h2 class="text-center">No hay salas creadas</h2>
        @endif

    </div>
    <!-- Si hay doctores -->
@endsection
