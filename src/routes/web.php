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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::controller(CartoesController::class)->group(function () {
    Route::get('/cards', 'index')->name('cards');
    Route::get('/view_create_card', 'create')->name('view_create_card');
    Route::post('/store_card', 'store')->name('store_card');
    Route::get('/destroy_card/{id}', 'destroy')->name('destroy_card');
    Route::get('/edit_card/{id}', 'edit')->name('edit_card');
    Route::put('/update_card/{id}', 'update')->name('update_card');
    Route::get('/viewInvoicesearch', 'viewInvoicesearch')->name('viewInvoicesearch');
    Route::post('/viewInvoice', 'viewInvoice')->name('viewInvoice');
});

Route::controller(CategoriasController::class)->group(function () {
    Route::get('/categories', 'index')->name('categories');
    Route::get('/view_create_category', 'create')->name('view_create_category');
    Route::post('/store_category', 'store')->name('store_category');
    Route::get('/view_edit_categories/{id}', 'edit')->name('view_edit_categories');
    Route::put('/update_categories/{id}', 'update')->name('update_categories');
    Route::get('/destroy_categories/{id}', 'destroy')->name('destroy_categories');
});

Route::controller(ComprasController::class)->group(function () {
    Route::get('/list_shopping', 'index')->name('list_shopping');
    Route::get('/view_create_shopping', 'create')->name('view_create_shopping');
    Route::post('/store_shopping', 'store')->name('store_shopping');
    Route::get('/view_edit_shopping/{id}', 'edit')->name('view_edit_shopping');
    Route::put('/update_shopping/{id}', 'update')->name('update_shopping');
    Route::get('/destroy_compras/{id}', 'destroy')->name('destroy_compras');
});

require __DIR__.'/auth.php';