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
                                    onclick="mostrardoc(), ocultarpaciente(), ocultarcita(), ocultarsala();"
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
                                    onclick="mostrarpaciente(), ocultardoc(), ocultarcita(), ocultarsala();"
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
                                    onclick="mostrarcita(), ocultardoc(), ocultarpaciente(), ocultarsala();"
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
                                    onclick="mostrarsala(), ocultarrcita(), ocultardoc(), ocultarpaciente();"
                                    class="btn btn-info text-white">Ver Mas</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--doctores-->
            <div class="container" id="doc">
                <h1>Personal Medico</h1>

                <!-- Si NO existes doctores -->

                <div th:if="${doctores.size() == 0}">

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar nuevo doctor</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form th:action="@{/api/doctores/registrar}" method="post">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <input type="text" name="nombre" placeholder="Nombre"
                                                        class="form-control" id="nombres">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <input type="text" name="apellido" placeholder="Apellido"
                                                        class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <input type="text" name="telefono" placeholder="Telefono"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" id="basic-addon1">@</span>
                                                    <input type="text" name="correo"
                                                        placeholder="CorreoElectronico" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="mb-3">
                                                    <input type="text" name="direccion" id=""
                                                        placeholder="Direccion" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="mb-3">
                                                    <select name="estadoCivil" class="form-control" id="estadoCivil">
                                                        <option selected>Estado Civil</option>
                                                        <option value="Soltero">Soltero(a)</option>
                                                        <option value="Casado">Casado(a)</option>
                                                        <option value="Divorciado">Divorciado(a)</option>
                                                        <option value="unionLibre">Union Libre</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="mb-3">
                                                    <select name="especialidad" id="" class="form-control">
                                                        <option selected>Especialidad</option>
                                                        <option value="Medicina General">Medicina General</option>
                                                        <option value="Medicina Interna">Medicina Interna</option>
                                                        <option value="Dermatologia">Dermatologia</option>
                                                        <option value="Ortopedia">Ortopedia</option>
                                                        <option value="Nutricion">Nutricion</option>
                                                        <option value="Pediatria">Pediatria</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="mb-3">
                                                    <select name="genero" id="" class="form-control">
                                                        <option selected>Genero</option>
                                                        <option value="Masculino">Masculino</option>
                                                        <option value="Femenino">Femenino</option>
                                                        <option value="Otro">Otro</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="mb-3">
                                                    <input type="text" name="dni" id=""
                                                        placeholder="DNI" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="mb-3">
                                                    <select name="jornadaLaboral" id=""
                                                        class="form-control">
                                                        <option selected>Jornada Laboral</option>
                                                        <option value="Matutina">Matutina</option>
                                                        <option value="Vespertina">Vespertina</option>
                                                        <option value="Nocturna">Nocturna</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-bs-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-primary">Guardar Doctor</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="card shadow">
                                <div class="card-body">
                                    <h4 class="m-3">No hay doctores registrados</h4>
                                    <button type="button" class="mx-3 btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        Nuevo Doctor
                                    </button>
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
                                        <a th:href="@{/app/doctores/doctor/}+${doctor.id}" class="btn btn-primary">Ver
                                            Mas</a>
                                        <a th:href="@{/api/doctores/delete/}+${doctor.id}"
                                            class="btn btn-danger">Eliminar</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>


                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar nuevo doctor</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form th:action="@{/api/doctores/registrar}" method="post">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <input type="text" name="nombre" placeholder="Nombre"
                                                            class="form-control" id="nombres">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <input type="text" name="apellido" placeholder="Apellido"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <input type="text" name="telefono" placeholder="Telefono"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon1">@</span>
                                                        <input type="text" name="correo"
                                                            placeholder="CorreoElectronico" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="mb-3">
                                                        <input type="text" name="direccion" id=""
                                                            placeholder="Direccion" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="mb-3">
                                                        <select name="estadoCivil" class="form-control"
                                                            id="estadoCivil">
                                                            <option selected>Estado Civil</option>
                                                            <option value="Soltero">Soltero(a)</option>
                                                            <option value="Casado">Casado(a)</option>
                                                            <option value="Divorciado">Divorciado(a)</option>
                                                            <option value="unionLibre">Union Libre</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="mb-3">
                                                        <select name="especialidad" id=""
                                                            class="form-control">
                                                            <option selected>Especialidad</option>
                                                            <option value="Medicina General">Medicina General</option>
                                                            <option value="Medicina Interna">Medicina Interna</option>
                                                            <option value="Dermatologia">Dermatologia</option>
                                                            <option value="Ortopedia">Ortopedia</option>
                                                            <option value="Nutricion">Nutricion</option>
                                                            <option value="Pediatria">Pediatria</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="mb-3">
                                                        <select name="genero" id="" class="form-control">
                                                            <option selected>Genero</option>
                                                            <option value="Masculino">Masculino</option>
                                                            <option value="Femenino">Femenino</option>
                                                            <option value="Otro">Otro</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="mb-3">
                                                        <input type="text" name="dni" id=""
                                                            placeholder="DNI" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="mb-3">
                                                        <select name="jornadaLaboral" id=""
                                                            class="form-control">
                                                            <option selected>Jornada Laboral</option>
                                                            <option value="Matutina">Matutina</option>
                                                            <option value="Vespertina">Vespertina</option>
                                                            <option value="Nocturna">Nocturna</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger"
                                                    data-bs-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-primary">Guardar Doctor</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <button type="button" class="mx-3 btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Nuevo Doctor
                        </button>
                        <button id="button" onclick="ocultardoc();" class="mx-3 btn btn-primary">Ocultar</button>
                    </div>
                </div>

            </div>

            <!--paciente-->
            <div class="container" id="paciente">
                <h1>Pacientes</h1>

                <!-- Si NO existes doctores -->
                <div th:if="${doctores.size() == 0}">

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar nuevo paciente</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form th:action="@{/api/doctores/registrar}" method="post">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <input type="text" name="nombre" placeholder="Nombre"
                                                        class="form-control" id="nombres">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <input type="text" name="apellido" placeholder="Apellido"
                                                        class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <input type="text" name="telefono" placeholder="Telefono"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" id="basic-addon1">@</span>
                                                    <input type="text" name="correo"
                                                        placeholder="CorreoElectronico" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="mb-3">
                                                    <input type="text" name="direccion" id=""
                                                        placeholder="Direccion" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="mb-3">
                                                    <select name="estadoCivil" class="form-control" id="estadoCivil">
                                                        <option selected>Estado Civil</option>
                                                        <option value="Soltero">Soltero(a)</option>
                                                        <option value="Casado">Casado(a)</option>
                                                        <option value="Divorciado">Divorciado(a)</option>
                                                        <option value="unionLibre">Union Libre</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="mb-3">
                                                    <select name="especialidad" id="" class="form-control">
                                                        <option selected>Especialidad</option>
                                                        <option value="Medicina General">Medicina General</option>
                                                        <option value="Medicina Interna">Medicina Interna</option>
                                                        <option value="Dermatologia">Dermatologia</option>
                                                        <option value="Ortopedia">Ortopedia</option>
                                                        <option value="Nutricion">Nutricion</option>
                                                        <option value="Pediatria">Pediatria</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="mb-3">
                                                    <select name="genero" id="" class="form-control">
                                                        <option selected>Genero</option>
                                                        <option value="Masculino">Masculino</option>
                                                        <option value="Femenino">Femenino</option>
                                                        <option value="Otro">Otro</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="mb-3">
                                                    <input type="text" name="dni" id=""
                                                        placeholder="DNI" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="mb-3">
                                                    <select name="jornadaLaboral" id=""
                                                        class="form-control">
                                                        <option selected>Jornada Laboral</option>
                                                        <option value="Matutina">Matutina</option>
                                                        <option value="Vespertina">Vespertina</option>
                                                        <option value="Nocturna">Nocturna</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-bs-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-primary">Guardar Doctor</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="card shadow">
                                <div class="card-body">
                                    <h4 class="m-3">No hay pacientes registrados</h4>
                                    <button type="button" class="mx-3 btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">Nuevo Paciente
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-4"></div>
                        <div class="col-4"></div>
                    </div>
                </div>
                <!-- Si hay doctores -->
                <div th:if="${doctores.size() != 0}">
                    <h2 class="text-center">Listado de Pacientes:</h2>
                    <div class="container">
                        <table class="table">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Apellido</th>
                                    <th scope="col">Correo</th>
                                    <th scope="col">Telefono</th>
                                    <th scope="col">Fecha Ingreso</th>
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
                                    <td th:text="${doctor.jornadaLaboral}"></td>
                                    <td>
                                        <a th:href="@{/app/doctores/doctor/}+${doctor.id}" class="btn btn-primary">Ver
                                            Mas</a>
                                        <a th:href="@{/api/doctores/delete/}+${doctor.id}"
                                            class="btn btn-danger">Eliminar</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>


                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar nuevo doctor</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form th:action="@{/api/doctores/registrar}" method="post">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <input type="text" name="nombre" placeholder="Nombre"
                                                            class="form-control" id="nombres">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <input type="text" name="apellido" placeholder="Apellido"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <input type="text" name="telefono" placeholder="Telefono"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon1">@</span>
                                                        <input type="text" name="correo"
                                                            placeholder="CorreoElectronico" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="mb-3">
                                                        <input type="text" name="direccion" id=""
                                                            placeholder="Direccion" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="mb-3">
                                                        <select name="estadoCivil" class="form-control"
                                                            id="estadoCivil">
                                                            <option selected>Estado Civil</option>
                                                            <option value="Soltero">Soltero(a)</option>
                                                            <option value="Casado">Casado(a)</option>
                                                            <option value="Divorciado">Divorciado(a)</option>
                                                            <option value="unionLibre">Union Libre</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="mb-3">
                                                        <select name="especialidad" id=""
                                                            class="form-control">
                                                            <option selected>Especialidad</option>
                                                            <option value="Medicina General">Medicina General</option>
                                                            <option value="Medicina Interna">Medicina Interna</option>
                                                            <option value="Dermatologia">Dermatologia</option>
                                                            <option value="Ortopedia">Ortopedia</option>
                                                            <option value="Nutricion">Nutricion</option>
                                                            <option value="Pediatria">Pediatria</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="mb-3">
                                                        <select name="genero" id="" class="form-control">
                                                            <option selected>Genero</option>
                                                            <option value="Masculino">Masculino</option>
                                                            <option value="Femenino">Femenino</option>
                                                            <option value="Otro">Otro</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="mb-3">
                                                        <input type="text" name="dni" id=""
                                                            placeholder="DNI" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="mb-3">
                                                        <select name="jornadaLaboral" id=""
                                                            class="form-control">
                                                            <option selected>Jornada Laboral</option>
                                                            <option value="Matutina">Matutina</option>
                                                            <option value="Vespertina">Vespertina</option>
                                                            <option value="Nocturna">Nocturna</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger"
                                                    data-bs-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-primary">Guardar
                                                    Paciente</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <button type="button" class="mx-3 btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Nuevo Paciente
                        </button>
                        <button id="button" onclick="ocultarpaciente();"
                            class="mx-3 btn btn-primary">Ocultar</button>
                    </div>
                </div>

            </div>

            <!--citas-->
            <div class="container" id="citas">
                <h1>Citas</h1>

                <!-- Si NO existes doctores -->
                <div th:if="${doctores.size() == 0}">

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Crear Cita</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form th:action="@{/api/doctores/registrar}" method="post">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <input type="text" name="nombre" placeholder="Nombre"
                                                        class="form-control" id="nombres">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <input type="text" name="apellido" placeholder="Apellido"
                                                        class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <input type="text" name="telefono" placeholder="Telefono"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" id="basic-addon1">@</span>
                                                    <input type="text" name="correo"
                                                        placeholder="CorreoElectronico" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="mb-3">
                                                    <input type="text" name="direccion" id=""
                                                        placeholder="Direccion" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="mb-3">
                                                    <select name="estadoCivil" class="form-control" id="estadoCivil">
                                                        <option selected>Estado Civil</option>
                                                        <option value="Soltero">Soltero(a)</option>
                                                        <option value="Casado">Casado(a)</option>
                                                        <option value="Divorciado">Divorciado(a)</option>
                                                        <option value="unionLibre">Union Libre</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="mb-3">
                                                    <select name="especialidad" id="" class="form-control">
                                                        <option selected>Especialidad</option>
                                                        <option value="Medicina General">Medicina General</option>
                                                        <option value="Medicina Interna">Medicina Interna</option>
                                                        <option value="Dermatologia">Dermatologia</option>
                                                        <option value="Ortopedia">Ortopedia</option>
                                                        <option value="Nutricion">Nutricion</option>
                                                        <option value="Pediatria">Pediatria</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="mb-3">
                                                    <select name="genero" id="" class="form-control">
                                                        <option selected>Genero</option>
                                                        <option value="Masculino">Masculino</option>
                                                        <option value="Femenino">Femenino</option>
                                                        <option value="Otro">Otro</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="mb-3">
                                                    <input type="text" name="dni" id=""
                                                        placeholder="DNI" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="mb-3">
                                                    <select name="jornadaLaboral" id=""
                                                        class="form-control">
                                                        <option selected>Jornada Laboral</option>
                                                        <option value="Matutina">Matutina</option>
                                                        <option value="Vespertina">Vespertina</option>
                                                        <option value="Nocturna">Nocturna</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-bs-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-primary">Guardar Doctor</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="card shadow">
                                <div class="card-body">
                                    <h4 class="m-3">Crear Nueva Sala</h4>
                                    <form action="{{ route('crearSala') }}" method="POST">
                                        @csrf
                                        <input type="text" name="nombre" id=""
                                            placeholder="Nombre de la sala" class="form-control mb-2">
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
                </div>
                <!-- Si hay doctores -->
                <div>
                    <h2 class="text-center">Lista de Citas:</h2>
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


                        <button type="button" class="mx-3 btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Crear Cita
                        </button>
                        <button id="button" onclick="ocultarcita();" class="mx-3 btn btn-primary">Ocultar</button>
                    </div>
                </div>

            </div>

            <!--salas-->
            <div class="container" id="salas">
                <h1>Salas</h1>

                <!-- Si NO existes doctores -->
                <div th:if="${doctores.size() == 0}">

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar nueva sala</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form th:action="@{/api/doctores/registrar}" method="post">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <input type="text" name="numero" placeholder="numero"
                                                        class="form-control" id="nombres">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <input type="text" name="doctor" placeholder="doctor"
                                                        class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="mb-3">
                                                    <select name="especialidad" id="" class="form-control">
                                                        <option selected>Especialidad</option>
                                                        <option value="Medicina General">Medicina General</option>
                                                        <option value="Medicina Interna">Medicina Interna</option>
                                                        <option value="Dermatologia">Dermatologia</option>
                                                        <option value="Ortopedia">Ortopedia</option>
                                                        <option value="Nutricion">Nutricion</option>
                                                        <option value="Pediatria">Pediatria</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="mb-3">
                                                    <select name="jornadaLaboral" id=""
                                                        class="form-control">
                                                        <option selected>Jornada Laboral</option>
                                                        <option value="Matutina">Matutina</option>
                                                        <option value="Vespertina">Vespertina</option>
                                                        <option value="Nocturna">Nocturna</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-bs-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-primary">Guardar Sala</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="card shadow">
                                <div class="card-body">
                                    <h4 class="m-3">No hay salas registradas</h4>
                                    <button type="button" class="mx-3 btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        Nueva Sala
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-4"></div>
                        <div class="col-4"></div>
                    </div>
                </div>
                <!-- Si hay doctores -->
                <div th:if="${doctores.size() != 0}">
                    <h2 class="text-center">Lista de Salas:</h2>
                    <div class="container">
                        <table class="table">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">Numero</th>
                                    <th scope="col">doctor</th>
                                    <th scope="col">Especialidad</th>
                                    <th scope="col">Jornada</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr th:each="sala : ${sala}">
                                    <th th:text="${sala.id}" scope="row">1</th>
                                    <td th:text="${sala.numero}"></td>
                                    <td th:text="${sala.doctor}"></td>
                                    <td th:text="${sala.especialidad}"></td>
                                    <td th:text="${sala.jornadaLaboral}"></td>
                                    <td>
                                        <a th:href="@{/app/sala/sala/}+${sala.id}" class="btn btn-primary">Ver Mas</a>
                                        <a th:href="@{/api/sala/delete/}+${sala.id}"
                                            class="btn btn-danger">Eliminar</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>


                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar nueva sala</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form th:action="@{/api/sala/registrar}" method="post">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <input type="text" name="numero" placeholder="numero"
                                                            class="form-control" id="numero">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <input type="text" name="doctor" placeholder="doctor"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="mb-3">
                                                        <select name="especialidad" id=""
                                                            class="form-control">
                                                            <option selected>Especialidad</option>
                                                            <option value="Medicina General">Medicina General</option>
                                                            <option value="Medicina Interna">Medicina Interna</option>
                                                            <option value="Dermatologia">Dermatologia</option>
                                                            <option value="Ortopedia">Ortopedia</option>
                                                            <option value="Nutricion">Nutricion</option>
                                                            <option value="Pediatria">Pediatria</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="mb-3">
                                                    <select name="jornadaLaboral" id=""
                                                        class="form-control">
                                                        <option selected>Jornada Laboral</option>
                                                        <option value="Matutina">Matutina</option>
                                                        <option value="Vespertina">Vespertina</option>
                                                        <option value="Nocturna">Nocturna</option>
                                                    </select>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger"
                                            data-bs-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-primary">Guardar sala</button>
                                    </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <button type="button" class="mx-3 btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        Nuevo Doctor
                    </button>
                    <button id="button" onclick="ocultarsala();" class="mx-3 btn btn-primary">Ocultar</button>
                </div>
            </div>
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
        </script>
    </section>
</body>

</html>
