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

Route::controller(CartoesController::class)->group(function () {
    Route::get('/cartoes', 'index')->name('cartoes_api');
    Route::post('/criar_cartao', 'store')->name('criar_cartao_api');
    Route::post('/puxar_relatorio', 'buscarFatura')->name('buscarFatura_api');
    Route::delete('/deletar_cartao/{id}', 'deletar')->name('deletar_cartao_api');
    Route::put('/editar_cartao/{id}', 'atualizar')->name('editar_cartao_api');
});

Route::controller(CategoriasController::class)->group(function () {
    Route::post('/criar_categoria', 'criar')->name('criar_categoria_api');
    Route::get('/categorias', 'index')->name('categorias_api');
    Route::put('/atualizar_categoria/{id}', 'atualizar')->name('atualizar_cartao_api');
    Route::delete('/deletar_categoria/{id}', 'deletar')->name('deletar_categorias_api');
});

Route::controller(ComprasController::class)->group(function () {
    Route::post('/criar_compras', 'criar')->name('criar_compras_api');
    Route::get('/compras', 'lista')->name('compras_api');
    Route::put('/atualizar_compras/{id}', 'atualizar')->name('atualizar_compras_api');
    Route::delete('/deletar_compras/{id}', 'deletar')->name('deletar_compras_api');
});