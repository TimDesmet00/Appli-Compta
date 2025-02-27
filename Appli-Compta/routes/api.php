<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APINodeJSController; // Importer le contrôleur APINodeJSController
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Ajouter une route pour appeler l'API Node.js client
Route::post('/client/add', [APINodeJSController::class, 'createClient']);
Route::get('/client/getall', [APINodeJSController::class, 'getAllClients']);
Route::get('/client/getone/{id}', [APINodeJSController::class, 'getClientById']);
Route::patch('/client/update/{id}', [APINodeJSController::class, 'updateClient']);
Route::delete('/client/delete/{id}', [APINodeJSController::class, 'deleteClient']);

// Ajouter une route pour appeler l'API Node.js facture
Route::post('/facture/add', [APINodeJSController::class, 'createInvoice']);
Route::get('/facture/getall', [APINodeJSController::class, 'getAllInvoices']);
Route::get('/facture/getone/{id}', [APINodeJSController::class, 'getFactureById']);
Route::get('/facture/getbyclient/{id}', [APINodeJSController::class, 'getFactureByClient']);
Route::get('/facture/getbyuser/{id}', [APINodeJSController::class, 'getFactureByUser']);
Route::patch('/facture/update/{id}', [APINodeJSController::class, 'updateFacture']);
Route::delete('/facture/delete/{id}', [APINodeJSController::class, 'deleteFacture']);

// Ajouter une route pour appeler l'API Node.js society

Route::post('/society/add', [APINodeJSController::class, 'createSociety']);
Route::get('/society/getall', [APINodeJSController::class, 'getAllSocieties']);
Route::get('/society/getone/{id}', [APINodeJSController::class, 'getSocietyById']);
Route::patch('/society/update/{id}', [APINodeJSController::class, 'updateSociety']);
Route::delete('/society/delete/{id}', [APINodeJSController::class, 'deleteSociety']);