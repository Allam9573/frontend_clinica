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

            $response = $client->request('GET', 'http://localhost:8080/api/citas/listar');
            $citas = json_decode($response->getBody(), true);

            return view('citas/citas', ['doctores' => $doctores, 'especialidades'=>$especialidades, 'pacientes'=>$pacientes, 'salas'=>$salas, 'citas'=> $citas]);
        } catch (\Exception $e) {
            return response('Error: ' . $e->getMessage(), 500);
        }
    }
    public function crearCita(Request $request){

        $client = new Client();

        $idDoctor = $request->input('idDoctor');
        $idPaciente = $request->input('idPaciente');
        $idSala = $request->input('idSalxa');

        try {
            $response = $client->request('POST', 'http://localhost:8080/api/citas/agregar/'.$idPaciente.'/'.$idDoctor.'/'.$idSala, [
                'Content-Type' => 'application/json',
                'json' => [
                    'pacientes' => $idPaciente,
                    'doctor' => $idDoctor,
                    'salas' => $idSala
                ],
            ]);

            if ($response->getStatusCode() === 200) {
                return redirect()->route('citas');
            } else {
                return response('Error al crear cita en Spring Boot', 500);
            }
        } catch (\Exception $e) {
            return response('Error: ' . $e->getMessage(), 500);
        }
    }
}
