@extends('base')

    <h1>Especialidad</h1>
        <div class="row">
                <div class="col-4">
                    <div class="card shadow">
                        <div class="card-body" id="tarjeta">
                            <h4 class="m-3">Crear Nueva Especialidad</h4>
                            <form action="" method="POST">
                                 @csrf
                                <input type="text" name="nombre" id=""
                                     placeholder="Nombre de la sala" class="form-control mb-2">
                            </form>
                            <button type="button" class="mx-3 btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Nueva Especialidad
                            </button>
                            <button id="button" onclick="ocultarcita();" class="mx-3 btn btn-primary">Ocultar</button>
                        </div>
                    </div>
                </div>
                <div class="col-4"></div>
                <div class="col-4"></div>
            </div>