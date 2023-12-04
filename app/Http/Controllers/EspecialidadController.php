<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;


class EspecialidadController extends Controller
{
    public function index(){
        return view('especialidades/especialidades');
    }
    public function crearEspecialidad(Request $request)
    {
        $nombre = $request->input('nombre');

        $client = new Client();

        try {
            $response = $client->request('POST', 'http://localhost:8080/api/especialidades/crear', [
                'json' => [
                    'nombre' => $nombre
                ],
            ]);

            if ($response->getStatusCode() === 200) {
                return redirect()->route('especialidades');
            } else {
                return response('Error al crear especialidad en Spring Boot', 500);
            }
        } catch (\Exception $e) {
            return response('Error: ' . $e->getMessage(), 500);
        }
    }
    public function obtenerEspecialidades()
    {
        $client = new Client();

        try {
            $response = $client->request('GET', 'http://localhost:8080/api/especialidades/listar');
            $especialidades = json_decode($response->getBody(), true);

            return view('especialidades/especialidades', ['especialidades' => $especialidades]);
        } catch (\Exception $e) {
            return response('Error: ' . $e->getMessage(), 500);
        }
    }
    public function editarEspecialidad($id){
        $client = new Client();

        try {
            $response = $client->request('GET', 'http://localhost:8080/api/especialidades/buscar/'.$id);
            $especialidad = json_decode($response->getBody(), true);

            return view('especialidades/editar_especialidad', ['especialidad' => $especialidad]);
        } catch (\Exception $e) {
            return response('Error: ' . $e->getMessage(), 500);
        }
    }
    public function actualizarEspecialidad($id, Request $request){
        $nombre = $request->input('nombre');

        $client = new Client();

        try {
            $response = $client->put('http://localhost:8080/api/especialidades/editar/'.$id, [
                'json' => [
                    'nombre' => $nombre
                ],
            ]);

            if ($response->getStatusCode() === 200) {
                return redirect()->route('especialidades');
            } else {
                return response('Error al crear especialidad en Spring Boot', 500);
            }
        } catch (\Exception $e) {
            return response('Error: ' . $e->getMessage(), 500);
        }
    }
    public function eliminarEspecialidad($id){
        $client = new Client();
        try {
            $response = $client->delete('http://localhost:8080/api/especialidades/eliminar/'.$id, [
               
            ]);

            if ($response->getStatusCode() === 200) {
                return redirect()->route('especialidades');
            } else {
                return response('Error al crear especialidad en Spring Boot', 500);
            }
        } catch (\Exception $e) {
            return response('Error: ' . $e->getMessage(), 500);
        }
    }
}
