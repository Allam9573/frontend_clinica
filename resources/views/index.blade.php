@extends('base')
@section('content')
    <div style="margin-left: 250px; padding: 15px;">
        <h1 class="my-5 text-secondary">Bienvenido al Panel de Administración</h1>
        <!-- Aquí puedes agregar el contenido específico de cada sección -->
        <div class="row">
            <div class="col-3">
                <div class="card shadow">
                    <div class="card-body">
                        <img src="{{ url('images/medical-team.png') }}" width="120px" class="m-2" alt="...">

                        <h3 class="card-title text-primary">Personal Medico</h3>
                        <h5 class="card-text text-secondary" th:text="${cantDoctores}+' doctores'"></h5>
                        <a href="{{ url('/doctores') }}" class="btn btn-primary">Ver Mas</a>
                    </div>
                </div>
            </div>

            <div class="col-3">
                <div class="card shadow">
                    <img src="{{ url('images/pacient.png') }}" width="120px" class="m-2" alt="...">
                    <div class="card-body">
                        <h3 class="card-title text-success">Pacientes</h3>
                        <h5 class="card-text text-secondary" th:text="'Informacion sobre pacientes'"></h5>
                        <a th:href="@{/app/pacientes}" class="btn btn-success">Ver Mas</a>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card shadow">
                    <img src="{{ url('images/health-check.png') }}" width="120px" class="m-2" alt="...">
                    <div class="card-body">
                        <h3 class="card-title text-danger">Citas Medicas</h3>
                        <h5 class="card-text text-secondary" th:text="${cantCitas}+' Citas Medicas'"></h5>
                        <a th:href="@{/app/citas}" class="btn btn-danger">Ver Mas</a>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card shadow">
                    <img src="{{ url('images/room.png') }}" width="120px" class="m-2" alt="...">
                    <div class="card-body">
                        <h3 class="card-title text-info">Salas</h3>
                        <h5 class="card-text text-secondary" th:text="'Medicamentos y mas'"></h5>
                        <a th:href="@{/app/farmacia}" class="btn btn-info text-white">Ver Mas</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
