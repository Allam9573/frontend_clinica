@extends('base')
@section('content')
<div class="container text-center mt-5">
    <h1>Editar Especialidad</h1>
    <div class="card shadow">
        <div class="card-body" id="tarjeta">
            <h4 class="m-3">Editar Informacion</h4>
            <form action="{{ route('crearEspecialidad') }}" method="POST">
                @csrf
                <input type="text" name="nombre" id="nombre" onkeyup="validateForm();"
                    placeholder="Nombre de la sala" class="form-control mb-2">
                <input type="submit" value="Actualizar Especialidad" id="btnSend" class="btn btn-success w-100" disabled>
            </form>
        </div>
    </div>
</div>
<script>
    function validateForm() {
        var nombre = document.getElementById('nombre');
        if (nombre.value.length === 0) {
            btnSend.disabled = true;
        } else {
            btnSend.disabled = false;
        }
    }
</script>
@endsection