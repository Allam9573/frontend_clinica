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
Route::get('/doctores', [DoctorController::class, 'index'])->name('doctores');
Route::get('/pacientes', [PacienteController::class, 'index'])->name('pacientes');

Route::get('/especialidades', [EspecialidadController::class, 'obtenerEspecialidades'])->name('especialidades');
Route::post('/crear_especialidad', [EspecialidadController::class, 'crearEspecialidad'])->name('crearEspecialidad');

Route::get('/salas', [SalaController::class, 'obtenerSalas'])->name('salas');
Route::post('/crear-sala', [SalaController::class, 'crearSala'])->name('crearSala');
Route::get('/sala-editar', [SalaController::class, 'editarSala'])->name('editarSala');
// Route::delete('/salas/{id}', /

Route::get('/citas',[CitaController::class, 'obtenerCitas'])->name('citas');

Route::get('/pacientes',[PacienteController::class, 'obtenerPacientes'])->name('pacientes');
Route::post('/crear-paciente', [PacienteController::class, 'crearPaciente'])->name('crearPaciente');

