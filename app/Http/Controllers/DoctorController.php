<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class DoctorController extends Controller
{
    public function index(){

        $client = new Client();

        try {
            $response = $client->request('GET', 'http://localhost:8080/api/especialidades/listar');
            $especialidades = json_decode($response->getBody(), true);

            return view('doctores/doctores', ['especialidades' => $especialidades]);
        } catch (\Exception $e) {
            return response('Error: ' . $e->getMessage(), 500);
        }
    }

    public function crearDoctor(Request $request)
    {
        $nombre = $request->input('nombre');
        $apellido = $request->input('apellido');
        $id_especialidad = $request->input('especialidad');

        $client = new Client();

        try {
            $response = $client->request('POST', 'http://localhost:8080/api/doctores/agregar/'.$id_especialidad, [
                'Content-Type' => 'application/json',
                'json' => [
                    'nombre' => $nombre,
                    'apellido' => $apellido
                ],
            ]);

            if ($response->getStatusCode() === 200) {
                return redirect()->route('doctores');
            } else {
                return response('Error al crear paciente en Spring Boot', 500);
            }
        } catch (\Exception $e) {
            return response('Error: ' . $e->getMessage(), 500);
        }
    }
    public function obtenerDoctores()
    {
        $client = new Client();

        try {
            $response = $client->request('GET', 'http://localhost:8080/api/doctores/listar');
            $doctores = json_decode($response->getBody(), true);

            $response = $client->request('GET', 'http://localhost:8080/api/especialidades/listar');
            $especialidades = json_decode($response->getBody(), true);

            return view('doctores/doctores', ['doctores' => $doctores, 'especialidades'=>$especialidades]);
        } catch (\Exception $e) {
            return response('Error: ' . $e->getMessage(), 500);
        }
    }
}
