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
        <h1>Bienvenido al Panel de Administración</h1>
        <div style=" margin-top:50px;">

            <!-- Aquí puedes agregar el contenido específico de cada sección -->
            <div class="contenido">
                <div class="row">
                    <div class="col-3">
                        <div class="card shadow">
                            <div class="card-body">
                                <img src="{{ url('images/medical-team.png') }}" width="120px" class="m-2"
                                    alt="...">

                                <h3 class="card-title text-primary">Personal Medico</h3>
                                <h5 class="card-text text-secondary" th:text="${cantDoctores}+' doctores'"></h5>
                                <button id=" boton"
                                onclick="mostrardoc(), ocultarpaciente(), ocultarcita(), ocultarsala(), ocultarespecialidad();"
                                    class="btn btn-primary">Ver Mas</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="card shadow">
                            <img src="{{ url('images/pacient.png') }}" width="120px" class="m-2" alt="...">
                            <div class="card-body">
                                <h3 class="card-title text-success">Pacientes</h3>
                                <h5 class="card-text text-secondary" th:text="'Informacion sobre pacientes'"></h5>
                                <a th:href="@{/app/pacientes}"
                                onclick="mostrarpaciente(), ocultardoc(), ocultarcita(), ocultarsala(), ocultarespecialidad();"
                                    class="btn btn-success">Ver Mas</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card shadow">
                            <img src="{{ url('images/health-check.png') }}" width="120px" class="m-2"
                                alt="...">
                            <div class="card-body">
                                <h3 class="card-title text-danger">Citas Medicas</h3>
                                <h5 class="card-text text-secondary" th:text="${cantCitas}+' Citas Medicas'"></h5>
                                <a th:href="@{/app/citas}"
                                onclick="mostrarcita(), ocultardoc(), ocultarpaciente(), ocultarsala(), ocultarespecialidad();"
                                    class="btn btn-danger">Ver Mas</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card shadow">
                            <img src="{{ url('images/room.png') }}" width="120px" class="m-2" alt="...">
                            <div class="card-body">
                                <h3 class="card-title text-info">Salas</h3>
                                <h5 class="card-text text-secondary" th:text="'Medicamentos y mas'"></h5>
                                <a th:href="@{/app/farmacia}"
                                onclick="mostrarsala(), ocultarcita(), ocultardoc(), ocultarpaciente(), ocultarespecialidad();"
                                    class="btn btn-info text-white">Ver Mas</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-3" style="margin-top: 20px">
                    <div class="card shadow">
                        <img src="{{ url('images/especialidades.jpeg') }}" width="120px" class="m-2" alt="...">
                        <div class="card-body">
                            <h3 class="card-title text-secondary">Especialidades</h3>
                            <h5 class="card-text text-secondary" th:text="'Informacion sobre pacientes'"></h5>
                            <a th:href="@{/app/pacientes}" onclick="mostrarespecialidad(), ocultardoc(), ocultarcita(), ocultarsala(), ocultarpaciente();" class="btn btn-secondary">Ver Mas</a>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <!--doctores-->
            <div class="container" id="doc">
            @include('doctores/doctores')
            </div>

            <!--paciente-->
            <div class="container" id="paciente">
            @include('pacientes/pacientes')
            
            <!--citas-->
            <div class="container" id="citas">
                @include('citas/citas')
            </div>

            <!--salas-->
            <div class="container" id="salas">
                @include('salas/salas')
            </div>

            <!--especialidad-->
            <div class="container" id="especialidad">
                @include('especialidades/especialidades')
            </div>

        <script>
            function mostrardoc() {
                document.getElementById('doc').style.display = 'block';
            }

            function ocultardoc() {
                document.getElementById('doc').style.display = 'none';
            }

            function mostrarpaciente() {
                document.getElementById('paciente').style.display = 'block';
            }

            function ocultarpaciente() {
                document.getElementById('paciente').style.display = 'none';
            }

            function mostrarcita() {
                document.getElementById('citas').style.display = 'block';
            }

            function ocultarcita() {
                document.getElementById('citas').style.display = 'none';
            }

            function mostrarsala() {
                document.getElementById('citas').style.display = 'block';
            }

            function ocultarsala() {
                document.getElementById('citas').style.display = 'none';
            }

            function mostrarespecialidad(){
            document.getElementById('especialidad').style.display='block';
            }

            function ocultarespecialidad(){
                document.getElementById('especialidad').style.display='none';
            }
        </script>
    </section>
</body>

</html>
