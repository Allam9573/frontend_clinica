@extends('base')
@section('content')
    <div class="container">
        <h1 class="my-5">Citas</h1>
        <div class="row">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-body" id="tarjeta">
                        <h4 class="m-3">Nueva Cita</h4>
                        <form id="crearCitaForm" action="{{ route('crearCita') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-4">
                                    <label for="especialidad">Especialidad:</label>
                                    <select class="form-control mb-4" name="especialidad" id="especialidad">
                                        @foreach ($especialidades as $especialidad)
                                            <option value="{{ $especialidad['idEspecialidad'] }}">
                                                {{ $especialidad['nombre'] }}</option>
                                        @endforeach
                                    </select>

                                    <label for="doctor">Doctor:</label>
                                    <select class="form-control" name="idDoctor" id="doctor">
                                        @foreach ($doctores as $doctor)
                                            <option value="{{ $doctor['idDoctor'] }}"> {{ $doctor['nombre'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-4">
                                    <label for="paciente">Paciente:</label>
                                    <select class="form-control mb-4" name="idPaciente" id="paciente">
                                        @foreach ($pacientes as $paciente)
                                            <option value="{{ $paciente['idPaciente'] }}">{{ $paciente['nombre'] }}</option>
                                        @endforeach
                                    </select>
                                    <label for="sala">Sala:</label>
                                    <select class="form-control" name="idSala" id="sala">
                                        @foreach ($salas as $sala)
                                            <option value="{{ $sala['idSala'] }}">{{ $sala['nombreSala'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <input type="submit" value="Crear Cita" class="btn btn-danger my-3">
                        </form>

                    </div>
                </div>
            </div>
        </div>
        @if ($citas != null)
            <div>
                <h2 class="text-center">Lista de Citas:</h2>
                <div class="container">
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">#ID</th>
                                <th scope="col">Paciente</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th th:text="${doctor.id}" scope="row">1</th>
                                <td th:text="${doctor.nombre}"></td>
                                <td>
                                    <a class="btn btn-danger">Eliminar</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        @else
            <h1 class="mt-5 text-center">No hay citas creadas.</h1>
        @endif
    </div>
    <!-- Si hay doctores -->

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            // Manejar el cambio en la selección de especialidad
            $('#especialidad').on('change', function() {
                var especialidadId = $(this).val();

                // Realizar una solicitud AJAX a Laravel para obtener los doctores
                $.ajax({
                    url: 'http://localhost:8080/api/doctores/listar/' + especialidadId,
                    method: 'GET',
                    success: function(data) {
                        // Limpiar y habilitar el campo de doctores
                        $('#doctor').empty().prop('disabled', false);

                        // Agregar las opciones de doctores
                        $.each(data, function(key, doctor) {
                            $('#doctor').append($('<option>', {
                                value: doctor.idDoctor,
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
