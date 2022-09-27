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

Route::controller(CartoesController::class)->middleware(['auth'])->group(function () {
    Route::get('/cards', 'index')->name('cards');
    Route::get('/show_create_card', 'create')->name('show_create_card');
    Route::post('/store_card', 'store')->name('store_card');
    Route::get('/destroy_card/{id}', 'destroy')->name('destroy_card');
    Route::get('/edit_card/{id}', 'edit')->name('edit_card');
    Route::put('/update_card/{id}', 'update')->name('update_card');
    Route::get('/showInvoicesearch', 'showInvoicesearch')->name('showInvoicesearch');
    Route::post('/showInvoice', 'showInvoice')->name('showInvoice');
});

Route::controller(CategoriasController::class)->middleware(['auth'])->group(function () {
    Route::get('/categories', 'index')->name('categories');
    Route::get('/show_create_category', 'create')->name('show_create_category');
    Route::post('/store_category', 'store')->name('store_category');
    Route::get('/show_edit_categories/{id}', 'edit')->name('show_edit_categories');
    Route::put('/update_categories/{id}', 'update')->name('update_categories');
    Route::get('/destroy_categories/{id}', 'destroy')->name('destroy_categories');
});

Route::controller(ComprasController::class)->middleware(['auth'])->group(function () {
    Route::get('/', 'index')->name('list_shopping');
    Route::get('/show_create_shopping', 'create')->name('show_create_shopping');
    Route::post('/store_shopping', 'store')->name('store_shopping');
    Route::get('/show_edit_shopping/{id}', 'edit')->name('show_edit_shopping');
    Route::put('/update_shopping/{id}', 'update')->name('update_shopping');
    Route::get('/destroy_compras/{id}', 'destroy')->name('destroy_compras');
});

require __DIR__.'/auth.php';