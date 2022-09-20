<?php

use App\Http\Controllers\API\CartoesController;
use App\Http\Controllers\API\CategoriasController;
use App\Http\Controllers\API\ComprasController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// cartoes
Route::get('cartoes', [CartoesController::class, 'index'])->name('cartoes_api');
Route::post('criar_cartao', [CartoesController::class, 'store'])->name('criar_cartao_api');
Route::delete('deletar_cartao/{id}', [CartoesController::class, 'deletar'])->name('deletar_cartao_api');
Route::put('editar_cartao/{id}', [CartoesController::class, 'atualizar'])->name('editar_cartao_api');

// categorias
Route::post('criar_categoria', [CategoriasController::class, 'criar'])->name('criar_categoria_api');
Route::get('categorias', [CategoriasController::class, 'index'])->name('categorias_api');
Route::put('atualizar_categoria/{id}', [CategoriasController::class, 'atualizar'])->name('atualizar_cartao_api');
Route::delete('deletar_categoria/{id}', [CategoriasController::class, 'deletar'])->name('deletar_categorias_api');

// compras
Route::get('compras', [ComprasController::class, 'lista'])->name('compras_api');
Route::post('criar_compras', [ComprasController::class, 'criar'])->name('criar_compras_api');
Route::delete('deletar_compras/{id}', [ComprasController::class, 'deletar'])->name('deletar_compras_api');
Route::put('atualizar_compras/{id}', [ComprasController::class, 'atualizar'])->name('atualizar_compras_api');

// relatorio
Route::post('puxar_relatorio', [CartoesController::class, 'buscarFatura'])->name('buscarFatura_api');
