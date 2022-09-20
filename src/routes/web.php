<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartoesController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ComprasController;

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

Route::controller(CartoesController::class)->group(function () {
    Route::get('/cartoes', 'index')->name('cartoes');
    Route::get('/criar_cartoes', 'criar')->name('criar_cartoes');
    Route::post('/criar_cartao', 'store')->name('criar_cartao');
    Route::get('/deletar_cartoes/{id}', 'deletar')->name('deletar_cartoes');
    Route::get('/editar_cartoes/{id}', 'editar')->name('editar_cartoes');
    Route::put('/atualizar_cartoes/{id}', 'atualizar')->name('atualizar_cartoes');
    Route::get('/relatorios', 'criarViewRelatorio')->name('relatorios');
    Route::post('/puxar_relatorio', 'buscarFatura')->name('buscarFatura');
});

Route::controller(CategoriasController::class)->group(function () {
    Route::get('/categorias', 'index')->name('categorias');
    Route::post('/criar_categorias', 'criar')->name('criar_categorias');
    Route::get('/criar_categoria', 'criarview')->name('criar_categoria');
    Route::get('/deletar_categorias/{id}', 'deletar')->name('deletar_categorias');
    Route::get('/editar_categorias/{id}', 'editar')->name('editar_categorias');
    Route::put('/atualizar_categorias/{id}', 'atualizar')->name('atualizar_categorias');
});

Route::controller(ComprasController::class)->group(function () {
    Route::get('/compras', 'index')->name('compras');
    Route::post('/criar_compras', 'criar')->name('criar_compras');
    Route::get('/deletar_compras/{id}', 'deletar')->name('deletar_compras');
    Route::get('/editar_compras/{id}', 'editar')->name('editar_compras');
    Route::put('/atualizar_compras/{id}', 'atualizar')->name('atualizar_compras');
    Route::get('/lista', 'lista')->name('lista');
});