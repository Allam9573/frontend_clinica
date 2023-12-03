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
                        <form action="" method="POST">
                            @csrf
                            <input type="text" name="nombre" id="" placeholder="Nombre"
                                class="form-control mb-2">
                            <input type="text" name="apellido" id="" placeholder="Apellido"
                                class="form-control mb-2">
                            <select name="especialidad" id="especialidad" class="form-control mb-2">
                                <option value="">Seleccione una especialidad</option>
                                @foreach ($especialidades as $especialidad)
                                    <option value="{{ $especialidad['idEspecialidad'] }}">{{ $especialidad['nombre'] }}
                                    </option>
                                @endforeach
                            </select>
                            <input type="submit" value="Guardar Doctor" class="btn btn-primary w-100">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-4"></div>
            <div class="col-4"></div>
        </div>
    </div>
    <!-- Si hay doctores -->
    <div th:if="${doctores.size() != 0}">
        <h2 class="text-center">Lista de Doctores:</h2>
        <div class="container">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Especialidad</th>
                        <th scope="col">Jornada</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr th:each="doctor : ${doctores}">
                        <th th:text="${doctor.id}" scope="row">1</th>
                        <td th:text="${doctor.nombre}"></td>
                        <td th:text="${doctor.apellido}"></td>
                        <td th:text="${doctor.especialidad}"></td>
                        <td th:text="${doctor.jornadaLaboral}"></td>
                        <td>
                            <a th:href="@{/app/doctores/doctor/}+${doctor.id}" class="btn btn-primary">Ver Mas</a>
                            <a th:href="@{/api/doctores/delete/}+${doctor.id}" class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
