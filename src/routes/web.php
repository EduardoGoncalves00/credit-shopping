<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartoesController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ComprasController;
use App\Models\Cartao;
use Illuminate\Http\Request;

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

Route::get('/', function () {
    return view('welcome');
});

// cartoes
Route::get('cartoes', [CartoesController::class, 'index'])->name('cartoes');

Route::get('criar_cartoes', [CartoesController::class, 'criar'])->name('criar_cartoes');

Route::post('criar_cartao', [CartoesController::class, 'store'])->name('criar_cartao');

Route::delete('deletar_cartoes/{id}', [CartoesController::class, 'deletar'])->name('deletar_cartoes');

Route::get('editar_cartoes/{id}', [CartoesController::class, 'editar'])->name('editar_cartoes');

Route::put('atualizar_cartoes/{id}', [CartoesController::class, 'atualizar'])->name('atualizar_cartoes');

Route::get('retornarcartoes', [CartoesController::class, 'retornarcartoes'])->name('retornarcartoes');


// categorias
Route::get('categorias', [CategoriasController::class, 'index'])->name('categorias');

Route::post('criar_categorias', [CategoriasController::class, 'criar'])->name('criar_categorias');

Route::get('criar_categoria', [CategoriasController::class, 'criarview'])->name('criar_categoria');

Route::delete('deletar_categorias/{id}', [CategoriasController::class, 'deletar'])->name('deletar_categorias');

Route::get('editar_categorias/{id}', [CategoriasController::class, 'editar'])->name('editar_categorias');

Route::put('atualizar_categorias/{id}', [CategoriasController::class, 'atualizar'])->name('atualizar_categorias');

// compras
Route::get('compras', [ComprasController::class, 'index'])->name('compras');

Route::post('criar_compras', [ComprasController::class, 'criar'])->name('criar_compras');

Route::delete('deletar_compras/{id}', [ComprasController::class, 'deletar'])->name('deletar_compras');

Route::get('editar_compras/{id}', [ComprasController::class, 'editar'])->name('editar_compras');

Route::put('atualizar_compras/{id}', [ComprasController::class, 'atualizar'])->name('atualizar_compras');

Route::get('lista', [ComprasController::class, 'lista'])->name('lista');


// relatorio
Route::get('relatorios', [CartoesController::class, 'criarViewRelatorio'])->name('relatorios');

Route::post('puxar_relatorio', [CartoesController::class, 'buscarFatura'])->name('buscarFatura');

