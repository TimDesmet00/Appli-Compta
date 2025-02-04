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

Route::get('/clients', function (){ return view('clients.showall'); })->name('clients.showall');
route::get('/client/new', function (){ return view('clients.new');})->name('client.new');
Route::get('/client/edit/{id}', [APINodeJSController::class, 'editClient'])->name('client.edit');
