@extends('base')

<h1>Salas</h1>

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