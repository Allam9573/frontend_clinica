<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class SalaController extends Controller
{
    public function index(){
        return view('salas/salas');
    }
    public function crearSala(Request $request)
    {
        $nombre = $request->input('nombre');
        $descripcion = $request->input('descripcion');

        $client = new Client();

        try {
            $response = $client->request('POST', 'http://localhost:8080/api/salas/crear', [
                'json' => [
                    'nombreSala' => $nombre,
                    'descripcion' => $descripcion,
                ],
            ]);

            if ($response->getStatusCode() === 200) {
                return redirect()->route('salas');
            } else {
                return response('Error al crear sala en Spring Boot', 500);
            }
        } catch (\Exception $e) {
            return response('Error: ' . $e->getMessage(), 500);
        }
    }
    public function obtenerSalas()
    {
        $client = new Client();

        try {
            $response = $client->request('GET', 'http://localhost:8080/api/salas/listar');
            $salas = json_decode($response->getBody(), true);

            return view('salas/salas', ['salas' => $salas]);
        } catch (\Exception $e) {
            return response('Error: ' . $e->getMessage(), 500);
        }
    }
}
