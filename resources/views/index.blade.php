@extends('base')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

        <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
        <link rel="stylesheet" href="{{ asset('css/base.css') }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>

    <body>
        <section>
            <div style=" margin-top:50px;">

                <!-- Aquí puedes agregar el contenido específico de cada sección -->
                <div class="container">
                    <h1 class="my-5 text-secondary">Bienvenido al Panel de Administración</h1>
                    <div class="row">
                        <div class="col-3">
                            <div class="card shadow">
                                <div class="card-body">
                                    <img src="{{ url('images/medical-team.png') }}" width="120px" class="m-2"
                                        alt="...">

                                    <h3 class="card-title text-primary">Personal Medico</h3>
                                    <h5 class="card-text text-secondary" th:text="${cantDoctores}+' doctores'"></h5>
                                    <a href="{{ route('doctores') }}" class="btn btn-primary">Ver Mas</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="card shadow">
                                <img src="{{ url('images/pacient.png') }}" width="120px" class="m-2" alt="...">
                                <div class="card-body">
                                    <h3 class="card-title text-success">Pacientes</h3>
                                    <h5 class="card-text text-secondary" th:text="'Informacion sobre pacientes'"></h5>
                                    <a href="{{ route('pacientes') }}" class="btn btn-success">Ver Mas</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card shadow">
                                <img src="{{ url('images/health-check.png') }}" width="120px" class="m-2"
                                    alt="...">
                                <div class="card-body">
                                    <h3 class="card-title text-danger">Citas Medicas</h3>
                                    <h5 class="card-text text-secondary"></h5>
                                    <a href="{{ route('citas') }}" class="btn btn-danger">Ver Mas</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card shadow">
                                <img src="{{ url('images/room.png') }}" width="120px" class="m-2" alt="...">
                                <div class="card-body">
                                    <h3 class="card-title text-info">Salas</h3>
                                    <h5 class="card-text text-secondary" th:text="'Medicamentos y mas'"></h5>
                                    <a href="{{ route('salas') }}" class="btn btn-info text-white">Ver Mas</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-3" style="margin-top: 20px">
                            <div class="card shadow">
                                <img src="{{ url('images/especialidades.jpeg') }}" width="120px" class="m-2"
                                    alt="...">
                                <div class="card-body">
                                    <h3 class="card-title text-secondary">Especialidades</h3>
                                    <h5 class="card-text text-secondary" th:text="'Informacion sobre pacientes'"></h5>
                                    <a href="{{ route('especialidades') }}" class="btn btn-secondary">Ver Mas</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




        </section>
    </body>

    </html>
@endsection
