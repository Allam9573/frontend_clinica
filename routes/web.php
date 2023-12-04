<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\EspecialidadController;
use App\Http\Controllers\SalaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::get('/doctores', [DoctorController::class, 'obtenerDoctores'])->name('doctores');
Route::post('/crear-doctor', [DoctorController::class, 'crearDoctor'])->name('crearDoctor');
Route::get('/eliminar-doctor/{id}', [DoctorController::class, 'eliminarDoctor'])->name('eliminarDoctor');

Route::get('/especialidades', [EspecialidadController::class, 'obtenerEspecialidades'])->name('especialidades');
Route::post('/crear_especialidad', [EspecialidadController::class, 'crearEspecialidad'])->name('crearEspecialidad');
Route::get('/editar-especialidad/{id}', [EspecialidadController::class, 'editarEspecialidad'])->name('editarEspecialidad');
Route::put('/actualizar-especialidad/{id}', [EspecialidadController::class, 'actualizarEspecialidad'])->name('actualizarEspecialidad');
Route::get('/eliminar-especialidad/{id}', [EspecialidadController::class, 'eliminarEspecialidad'])->name('eliminarEspecialidad');

Route::get('/salas', [SalaController::class, 'obtenerSalas'])->name('salas');
Route::post('/crear-sala', [SalaController::class, 'crearSala'])->name('crearSala');
Route::get('/sala-editar', [SalaController::class, 'editarSala'])->name('editarSala');
Route::get('/eliminar-sala/{id}', [SalaController::class, 'eliminarSala'])->name('eliminarSala');

Route::get('/citas', [CitaController::class, 'index'])->name('citas');
// Route::get('/citas/1', [CitaController::class, 'obtenerDoctoresEspecialidad'])->name('obtenerDoctoresEspecialidad');
Route::get('/citas/{especialidadId}', [CitaController::class, 'obtenerDoctoresEspecialidad'])->name('obtenerDoctoresEspecialidad');


Route::get('/pacientes',[PacienteController::class, 'obtenerPacientes'])->name('pacientes');
Route::post('/crear-paciente', [PacienteController::class, 'crearPaciente'])->name('crearPaciente');
Route::get('editar-paciente/{id}', [PacienteController::class, 'editarPaciente'])->name('editarPaciente');
Route::post('/actualizar-paciente/{id}', [PacienteController::class, 'actualizarPaciente'])->name('actualizarPaciente');
Route::get('/eliminar-paciente/{id}', [PacienteController::class, 'eliminarPaciente'])->name('eliminarPaciente');

// especialidades
// Route::get('/especialidades/{especialidadId}', [CitaController::class, 'obtenerDoctores'])->name('obtenerDoctores');

