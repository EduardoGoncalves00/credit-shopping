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
    Route::get('/cards', 'index')->name('cards');
    Route::post('/store_card', 'store')->name('store_card_api');
    Route::put('/update_card/{id}', 'update')->name('update_card_api');
    Route::delete('/destroy_card/{id}', 'destroy')->name('destroy_card_api');
    Route::post('/viewInvoice', 'viewInvoice')->name('viewInvoice_api');
});

Route::controller(CategoriasController::class)->group(function () {
    Route::get('/categories', 'index')->name('categories_api');
    Route::post('/store_categorie', 'store')->name('store_categorie_api');
    Route::put('/update_categories/{id}', 'update')->name('update_categories_api');
    Route::delete('/destroy_categories/{id}', 'destroy')->name('destroy_categories_api');
});

Route::controller(ComprasController::class)->group(function () {
    Route::get('/shoppings', 'index')->name('shoppings_api');
    Route::post('/store_shopping', 'store')->name('store_shopping_api');
    Route::put('/update_shopping/{id}', 'update')->name('update_shopping_api');
    Route::delete('/destroy_shopping/{id}', 'destroy')->name('destroy_shopping_api');
});