<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class PacienteController extends Controller
{
    public function index(){
        return view('pacientes/pacientes');
    }

    public function crearPaciente(Request $request)
    {
        $nombre = $request->input('nombre');
        $apellido = $request->input('apellido');
        $direccion = $request->input('direccion');
        $telefono = $request->input('telefono');

        $client = new Client();

        try {
            $response = $client->request('POST', 'http://localhost:8080/api/paciente/crear', [
                'json' => [
                    'nombre' => $nombre,
                    'apellido' => $apellido,
                    'direccion'=>$direccion,
                    'telefono'=>$telefono
                ],
            ]);

            if ($response->getStatusCode() === 200) {
                return redirect()->route('pacientes');
            } else {
                return response('Error al crear paciente en Spring Boot', 500);
            }
        } catch (\Exception $e) {
            return response('Error: ' . $e->getMessage(), 500);
        }
    }
    public function obtenerPacientes()
    {
        $client = new Client();

        try {
            $response = $client->request('GET', 'http://localhost:8080/api/paciente/listar');
            $pacientes = json_decode($response->getBody(), true);

            return view('pacientes/pacientes', ['pacientes' => $pacientes]);
        } catch (\Exception $e) {
            return response('Error: ' . $e->getMessage(), 500);
        }
    }

    public function eliminarPaciente($id){
        $client = new Client();
        try {
            $response = $client->request('GET', 'http://localhost:8080/api/paciente/eliminar/' . $id);
            if ($response->getStatusCode() === 200) {
                return redirect()->route('pacientes')->with('success', 'Registro eliminado correctamente');
            } else {
                return response('Error al eliminar el registro en Spring Boot', 500);
            }
        } catch (\Exception $e) {
            return response('Error: ' . $e->getMessage(), 500);
        }
    }
}
