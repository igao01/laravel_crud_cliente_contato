<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ContatoController;

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

// CLIENTE
Route::prefix('cliente')->group(function() {

	Route::post('/cadastrar', [ClienteController::class, 'create']);
	Route::get('/', [ClienteController::class, 'list'])->name('home');
	Route::get('/{id}/editar', [ClienteController::class, 'listById'])->name('editarCliente');
	Route::get('/cadastrar', [ClienteController::class, 'telaCreate'])->name('cadastrarCliente');
	Route::post('/{id}/editar', [ClienteController::class, 'update']);
	Route::get('/{id}', [ClienteController::class, 'del'])->name('deletarCliente');
});

// CONTATO
Route::prefix('contato')->group(function() {

	Route::post('/{idCliente}/cadastrar', [ContatoController::class, 'create']);
	Route::get('/{idCliente}/cadastrar', [ContatoController::class, 'telaCreate'])->name('cadastrarContato');
	Route::get('/{idCliente}', [ContatoController::class, 'list'])->name('contatos');
	Route::get('/{idCliente}/{id}/editar', [ContatoController::class, 'listById'])->name('editarContato');
	Route::get('/{idCliente}/{id}', [ContatoController::class, 'del'])->name('deletarContato');
	Route::post('/{idCliente}/{id}/editar', [ContatoController::class, 'update']);
	
});
