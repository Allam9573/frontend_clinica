<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class SalaController extends Controller
{
    public function formSala(){
        return view('index');
    }
    public function crearSala(Request $request)
    {
        $nombre = $request->input('nombre');
        $descripcion = $request->input('descripcion');

        $client = new Client();

        try {
            $response = $client->request('POST', 'http://localhost:8080/api/salas/crear', [
                'json' => [
                    'nombre' => $nombre,
                    'descripcion' => $descripcion,
                    // Agrega más campos según tus necesidades
                ],
            ]);

            $body = $response->getBody()->getContents();
            return response($body, $response->getStatusCode());
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

            return view('index', ['salas' => $salas]);
        } catch (\Exception $e) {
            return response('Error: ' . $e->getMessage(), 500);
        }
    }
}
