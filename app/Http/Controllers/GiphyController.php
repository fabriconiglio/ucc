<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;


class GiphyController extends Controller
{
    //
    public function index()
    {
        $apiKey = 'TU_API_KEY'; // Reemplaza 'TU_API_KEY' con tu clave API
        $searchTerm = 'funny'; // Esto es solo un término de búsqueda de ejemplo. Puedes hacer que los usuarios ingresen su propio término.

        $client = new Client([
            'base_uri' => 'http://api.giphy.com/v1/gifs/',
        ]);

        $response = $client->request('GET', 'search', [
            'query' => [
                'q' => $searchTerm,
                'api_key' => $apiKey,
                'limit' => 10
            ]
        ]);

        $gifs = json_decode($response->getBody())->data;

        return view('giphy.index', ['gifs' => $gifs]);
    }
}
