<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CitaController extends Controller
{
    public function index(){
        return view('citas/citas');
    }
    public function obtenerCitas(){
        return view('citas/citas');
    }
    public function obtenerDoctores($especialidadId)
    {
        

        $doctores = Doctor::where('especialidad_id', $especialidadId)->get();

        return response()->json($doctores);
    }
}
