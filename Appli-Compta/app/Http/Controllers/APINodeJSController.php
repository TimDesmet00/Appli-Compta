<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log; 

class APINodeJSController extends Controller
{
    //Controller pour les clients

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
            return $response;
        } else {
            return response()->json(['error' => 'Erreur lors de l\'appel à l\'API Node.js'], 500);
        }
    }

    public function updateClient(Request $request, $id)
    {
        $url = env('NODE_API_URL') . "/client/update/{$id}";
        $response = Http::patch($url, $request->all());

        if ($response->successful()) {
            return redirect()->route('clients.showall')->with('success', 'Client modifier avec succès');
        } else {
            return redirect()->route('client.edit', ['id' => $id])->with('error', 'Erreur lors de l\'appel à l\'API Node.js');
        }
    }

    public function showClient($id)
    {
        $cleanId = ltrim($id, '-');
        $clientResponse = $this->getClientById($cleanId);

        if ($clientResponse->status() === 200) {
            $clientData = $clientResponse->json();
            $client = $clientData['data']['client'];
            return view('clients.show', compact('client'));
        } else {
            return redirect()->route('clients.showall')->with('error', 'Erreur lors de la récupération des données du client');
        }
    }

    public function editClient($id)
    {
        $cleanId = ltrim($id, '-');

        $clientResponse = $this->getClientById($cleanId);


        if ($clientResponse->status() === 200) {
            $clientData = $clientResponse->json();
            $client = $clientData['data']['client'];
            return view('clients.edit', compact('client'));
        } else {
            return redirect()->route('clients.showall')->with('error', 'Erreur lors de la récupération des données du client');
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

    //controlleur pour les factures

    public function createInvoice(Request $request) {
        $url = env('NODE_API_URL') . '/facture/add';
        $response = Http::post($url, $request->all());

        if ($response->successful()) {
            return redirect()->route('factures.showall')->with('success', 'Facture ajoutée avec succès');
        } else {
            return redirect()->route('factures.new')->with('error', 'Erreur lors de l\'appel à l\'API Node.js');
        }
    }

    public function createInvoiceForm(){
        $url = env('NODE_API_URL') . '/client/getall';
        $response = Http::get($url);

        $societyUrl = env('NODE_API_URL') . '/society/getall';
        $societyResponse = Http::get($societyUrl);

        if ($response->successful()) {
            $clients = $response->json()['data']['clients'];
            $societies = $societyResponse->json()['data']['societies'];
            $invoiceNumber = $this->generateInvoiceNumber();
            return view('factures.new', compact('clients', 'societies', 'invoiceNumber'));
        } else {
            return redirect()->route('factures.index')->with('error', 'Erreur lors de la récupération des clients');
        }
    }

    private function generateInvoiceNumber() {
        $date = date('Ymd');
        $lastInvoice = DB::table('invoices')
            ->where('number', 'like', $date . '%')
            ->orderBy('number', 'desc')
            ->first();

        if ($lastInvoice) {
            $lastNumber = (int)substr($lastInvoice->number, 8);
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }

        return $date . str_pad($newNumber, 4, '0', STR_PAD_LEFT);
    }

    public function getAllInvoices() {
        $url = env('NODE_API_URL') . '/facture/getall';
        $response = Http::get($url);

        if ($response->successful()) {
            $decodedResponse = json_decode($response->body(), true);
            return response()->json($decodedResponse);
        } else {
            return response()->json(['error' => 'Erreur lors de l\'appel à l\'API Node.js'], 500);
        }
    }

    public function getInvoiceById($id) {
        $url = env('NODE_API_URL') . "/facture/getone/{$id}";
        $response = Http::get($url);

        if ($response->successful()) {
            return $response;
        } else {
            return response()->json(['error' => 'Erreur lors de l\'appel à l\'API Node.js'], 500);
        }
    }

    public function getAllByClient($id) {
        $url = env('NODE_API_URL') . "/facture/getbyclient/{$id}";
        $response = Http::get($url);

        if ($response->successful()) {
            $decodedResponse = json_decode($response->body(), true);
            return response()->json($decodedResponse);
        } else {
            return response()->json(['error' => 'Erreur lors de l\'appel à l\'API Node.js'], 500);
        }
    }

    public function getAllByUsociety($id) {
        $url = env('NODE_API_URL') . "/facture/getbyuser/{$id}";
        $response = Http::get($url);

        if ($response->successful()) {
            $decodedResponse = json_decode($response->body(), true);
            return response()->json($decodedResponse);
        } else {
            return response()->json(['error' => 'Erreur lors de l\'appel à l\'API Node.js'], 500);
        }
    }

    public function updateInvoice(Request $request, $id) {
        $url = env('NODE_API_URL') . "/facture/update/{$id}";
        $response = Http::patch($url, $request->all());

        if ($response->successful()) {
            return redirect()->route('factures.showall')->with('success', 'Facture modifiée avec succès');
        } else {
            return redirect()->route('factures.edit', ['id' => $id])->with('error', 'Erreur lors de l\'appel à l\'API Node.js');
        }
    }

    public function showInvoice($id) {
        $cleanId = ltrim($id, '-');
        $invoiceResponse = $this->getInvoiceById($cleanId);

        if ($invoiceResponse->status() === 200) {
            $invoiceData = $invoiceResponse->json();
            $invoice = $invoiceData['data']['invoice'];
            return view('invoices.show', compact('invoice'));
        } else {
            return redirect()->route('factures.showall')->with('error', 'Erreur lors de la récupération des données de la facture');
        }
    }

    public function editInvoice($id) {
        $cleanId = ltrim($id, '-');

        $invoiceResponse = $this->getInvoiceById($cleanId);

        if ($invoiceResponse->status() === 200) {
            $invoiceData = $invoiceResponse->json();
            $invoice = $invoiceData['data']['invoice'];
            return view('invoices.edit', compact('invoice'));
        } else {
            return redirect()->route('factures.showall')->with('error', 'Erreur lors de la récupération des données de la facture');
        }
    }

    public function deleteInvoice($id) {
        $url = env('NODE_API_URL') . "/facture/delete/{$id}";
        $response = Http::delete($url);

        if ($response->successful()) {
            return $response->json();
        } else {
            return response()->json(['error' => 'Erreur lors de l\'appel à l\'API Node.js'], 500);
        }
    }

    // Controller pour les Sociétés

    public function createSociety(Request $request) {
        $url = env('NODE_API_URL') . '/society/add';
        $response = Http::post($url, $request->all());

        if ($response->successful()) {
            return redirect()->route('societies.showall')->with('success', 'Société ajoutée avec succès');
        } else {
            return redirect()->route('societies.new')->with('error', 'Erreur lors de l\'appel à l\'API Node.js');
        }
    }

    public function getAllSocieties() {
        $url = env('NODE_API_URL') . '/society/getall';
        $response = Http::get($url);

        if ($response->successful()) {
            $decodedResponse = json_decode($response->body(), true);
            return response()->json($decodedResponse);
        } else {
            return response()->json(['error' => 'Erreur lors de l\'appel à l\'API Node.js'], 500);
        }
    }

    public function getSocietyById($id) {
        $url = env('NODE_API_URL') . "/society/getone/{$id}";
        $response = Http::get($url);

        if ($response->successful()) {
            return $response;
        } else {
            return response()->json(['error' => 'Erreur lors de l\'appel à l\'API Node.js'], 500);
        }
    }

    public function updateSociety(Request $request, $id) {
        $url = env('NODE_API_URL') . "/society/update/{$id}";
        $response = Http::patch($url, $request->all());

        if ($response->successful()) {
            return redirect()->route('societies.showall')->with('success', 'Société modifiée avec succès');
        } else {
            return redirect()->route('societies.edit', ['id' => $id])->with('error', 'Erreur lors de l\'appel à l\'API Node.js');
        }
    }

    public function showSociety($id) {
        $cleanId = ltrim($id, '-');
        $societyResponse = $this->getSocietyById($cleanId);

        if ($societyResponse->status() === 200) {
            $societyData = $societyResponse->json();
            $society = $societyData['data']['society'];
            return view('societies.show', compact('society'));
        } else {
            return redirect()->route('societies.showall')->with('error', 'Erreur lors de la récupération des données de la société');
        }
    }

    public function editSociety($id) {
        $cleanId = ltrim($id, '-');

        $societyResponse = $this->getSocietyById($cleanId);

        if ($societyResponse->status() === 200) {
            $societyData = $societyResponse->json();
            $society = $societyData['data']['society'];
            return view('societies.edit', compact('society'));
        } else {
            return redirect()->route('societies.showall')->with('error', 'Erreur lors de la récupération des données de la société');
        }
    }

    public function deleteSociety($id) {
        $url = env('NODE_API_URL') . "/society/delete/{$id}";
        $response = Http::delete($url);

        if ($response->successful()) {
            return $response->json();
        } else {
            return response()->json(['error' => 'Erreur lors de l\'appel à l\'API Node.js'], 500);
        }
    }




}