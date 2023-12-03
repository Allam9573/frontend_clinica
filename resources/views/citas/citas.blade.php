@extends('base')
@section('content')
    <div class="container">
        <h1 class="my-5">Citas</h1>
        <div class="row">
            <div class="col-4">
                <div class="card shadow">
                    <div class="card-body" id="tarjeta">
                        <h4 class="m-3">Nueva Cita</h4>
                        <form action="">
                            <label>
                                <input type="radio" name="opcion" value="opcion1">
                                <img src="{{route('public/images/pediatria.png')}}" alt="Opción 1">
                            </label>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-4"></div>
            <div class="col-4"></div>
        </div>
    </div>
    <!-- Si hay doctores -->
    <div>
        <h2 class="text-center">Lista de Citas:</h2>
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


            <button type="button" class="mx-3 btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Crear Cita
            </button>
            <button id="button" onclick="ocultarcita();" class="mx-3 btn btn-primary">Ocultar</button>
        </div>
    </div>
@endsection
