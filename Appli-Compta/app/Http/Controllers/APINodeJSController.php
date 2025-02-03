<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log; 

class APINodeJSController extends Controller
{
    public function createClient(Request $request)
    {
        $url = env('NODE_API_URL') . '/client/add';
        $response = Http::post($url, $request->all());

        if ($response->successful()) {
            return redirect()->route('clients.showall')->with('success', 'Client ajouté avec succès');
        } else {
            return redirect()->route('client.new')->with('error', 'Erreur lors de l\'appel à l\'API Node.js');
        }
    }

    public function getAllClients()
    {
      
        $url = env('NODE_API_URL') . '/client/getall';
        $response = Http::get($url);

        Log::info('API Node.js Response:', ['response' => $response->body()]);

        if ($response->successful()) {
            $decodedResponse = json_decode($response->body(), true); // Décoder la réponse JSON une fois de plus
            return response()->json($decodedResponse);
        } else {
            return response()->json(['error' => 'Erreur lors de l\'appel à l\'API Node.js'], 500);
        }
    }

    public function getClientById($id)
    {
        $url = env('NODE_API_URL') . "/client/getone/{$id}";
        $response = Http::get($url);

        if ($response->successful()) {
            return $response->json();
        } else {
            return response()->json(['error' => 'Erreur lors de l\'appel à l\'API Node.js'], 500);
        }
    }

    public function updateClient(Request $request, $id)
    {
        $url = env('NODE_API_URL') . "/client/update/{$id}";
        $response = Http::patch($url, $request->all());

        if ($response->successful()) {
            return $response->json();
        } else {
            return response()->json(['error' => 'Erreur lors de l\'appel à l\'API Node.js'], 500);
        }
    }

    public function deleteClient($id)
    {
        $url = env('NODE_API_URL') . "/client/delete/{$id}";
        $response = Http::delete($url);

        if ($response->successful()) {
            return $response->json();
        } else {
            return response()->json(['error' => 'Erreur lors de l\'appel à l\'API Node.js'], 500);
        }
    }
}