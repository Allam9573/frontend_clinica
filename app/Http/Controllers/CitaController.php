<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class CitaController extends Controller
{
    public function citas(){

        return view("citas/citas");
    }
    public function obtenerDoctoresEspecialidad($especialidadId)
    {
        $client = new Client();
        
        try {
            $response = $client->request('GET', 'http://localhost:8080/api/doctores/listar/'.$especialidadId);
            $doctores = json_decode($response->getBody(), true);

            $response = $client->request('GET', 'http://localhost:8080/api/especialidades/listar');
            $especialidades = json_decode($response->getBody(), true);

            $response = $client->request('GET', 'http://localhost:8080/api/paciente/listar');
            $pacientes = json_decode($response->getBody(), true);

            $response = $client->request('GET', 'http://localhost:8080/api/salas/listar');
            $salas = json_decode($response->getBody(), true);

            return view('citas/citas', ['doctores' => $doctores, 'especialidades'=>$especialidades, 'pacientes'=>$pacientes, 'salas'=>$salas]);
        } catch (\Exception $e) {
            return response('Error: ' . $e->getMessage(), 500);
        }
    }
}
