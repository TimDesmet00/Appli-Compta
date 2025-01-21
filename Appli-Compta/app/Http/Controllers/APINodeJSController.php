<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function callNodeApi()
    {
        // URL de l'API Node.js
        $url = env('NODE_API_URL') . '/api/test';

        // Faire une requête GET
        $response = Http::get($url);

        // Vérifier la réponse et renvoyer les données
        if ($response->successful()) {
            return $response->json();
        } else {
            return response()->json(['error' => 'Erreur lors de l\'appel à l\'API Node.js'], 500);
        }
    }
}