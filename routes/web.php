<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\CitaController;
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
// url salas
Route::get('/', [SalaController::class, 'formSala']);
Route::post('/crear-sala', [SalaController::class, 'crearSala'])->name('crearSala');
Route::get('/', [SalaController::class,'obtenerSalas'])->name('obtenerSalas');