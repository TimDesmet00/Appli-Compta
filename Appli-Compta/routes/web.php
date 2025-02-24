<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccueilController; // Importer le contrôleur AccueilController
use App\Http\Controllers\APINodeJSController; // Importer le contrôleur APINodeJSController

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [AccueilController::class, 'index'])->name('accueil.index');

// Ajouter une route pour appeler l'API Node.js client
Route::get('/clients', function (){ return view('clients.showall'); })->name('clients.showall');
Route::get('/client/new', function (){ return view('clients.new');})->name('client.new');
Route::get('/client/edit/{id}', [APINodeJSController::class, 'editClient'])->name('client.edit');
Route::get('/client/show/{id}', [APINodeJSController::class, 'showClient'])->name('client.show');

// Ajouter une route pour appeler l'API Node.js facture
Route::get('/factures', function (){ return view('factures.showall'); })->name('factures.showall');
Route::get('/facture/new', [APINodeJSController::class, 'createInvoiceForm'])->name('facture.new');
Route::get('/facture/edit/{id}', [APINodeJSController::class, 'editFacture'])->name('facture.edit');
Route::get('/facture/show/{id}', [APINodeJSController::class, 'showFacture'])->name('facture.show');

// Ajouter une route pour appeler l'API Node.js society
Route::get('/society', function (){ return view('society.showall'); })->name('societies.showall');
Route::get('/society/new', function (){ return view('society.new'); })->name('society.new');
Route::get('/society/edit/{id}', [APINodeJSController::class, 'editSociety'])->name('society.edit');
Route::get('/society/show/{id}', [APINodeJSController::class, 'showSociety'])->name('society.show');
