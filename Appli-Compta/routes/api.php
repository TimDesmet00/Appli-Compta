<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APINodeJSController as ApiController; // Importer le contrôleur APINodeJSController
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