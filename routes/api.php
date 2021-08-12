<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ContatoController;

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

//TESTA A REQUISICAO HTTP DA API
Route::get('/ping', function(){
	return 'pong';
});

// CLIENTE
Route::prefix('cliente')->group(function() {

	Route::post('/', [ClienteController::class, 'create']);
	Route::get('/', [ClienteController::class, 'list']);
	Route::get('/{id}', [ClienteController::class, 'listById']);
	Route::put('/{id}', [ClienteController::class, 'update']);
	Route::delete('/{id}', [ClienteController::class, 'del']);
});

// CLIENTE
Route::prefix('contato')->group(function() {

	Route::post('/{idCliente}', [ContatoController::class, 'create']);
	Route::get('/{idCliente}', [ContatoController::class, 'list']);
	Route::get('/{idCliente}/{id}', [ContatoController::class, 'listById']);
	Route::put('/{idCliente}/{id}', [ContatoController::class, 'update']);
	Route::delete('/{id}', [ContatoController::class, 'del']);
});
