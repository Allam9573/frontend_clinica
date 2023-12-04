@extends('base')
@section('content')
    <div class="container">
        <h1 class="my-5">Citas</h1>
        <div class="row">
            <div class="col-4">
                <div class="card shadow">
                    <div class="card-body" id="tarjeta">
                        <h4 class="m-3">Nueva Cita</h4>
                        <form id="crearCitaForm">
                            @csrf
                            <label for="especialidad">Especialidad:</label>
                            <select class="form-control" name="especialidad" id="especialidad">
                                <!-- Agrega las opciones de especialidades aquí -->
                                <option value="1">Especialidad 1</option>
                                <option value="2">Especialidad 2</option>
                                <!-- ... -->
                            </select>

                            <label for="doctor">Doctor:</label>
                            <select class="form-control" name="doctor" id="doctor">
                                <!-- Opciones de doctores se cargarán dinámicamente -->
                            </select>

                            <button type="submit">Crear Cita</button>
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

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            // Manejar el cambio en la selección de especialidad
            $('#especialidad').on('change', function() {
                var especialidadId = $(this).val();

                // Realizar una solicitud AJAX para obtener los doctores
                $.ajax({
                    url: '/obtenerDoctores/' + especialidadId,
                    method: 'GET',
                    success: function(data) {
                        // Limpiar y habilitar el campo de doctores
                        $('#doctor').empty().prop('disabled', false);

                        // Agregar las opciones de doctores
                        $.each(data, function(key, doctor) {
                            $('#doctor').append($('<option>', {
                                value: doctor.id,
                                text: doctor.nombre + ' ' + doctor.apellido
                            }));
                        });
                    },
                    error: function(error) {
                        console.error(error);
                    }
                });
            });
        });
    </script>
@endsection
