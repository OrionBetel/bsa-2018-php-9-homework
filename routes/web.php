<?php

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
    return 'Currency market';
});

Route::prefix('currencies')->group(function () {
    Route::get('/', 'CurrenciesController@showAll')
        ->name('currencies');

    Route::get('{id}', 'CurrenciesController@showParticular')
        ->where('id', '[0-9]+')
        ->name('particular-currency');

    Route::get('add', 'CurrenciesController@showAddForm')
        ->name('show-add-form');

    Route::post('add', 'CurrenciesController@add')
        ->name('add-currency');

    Route::get('{id}/edit', 'CurrenciesController@showEditForm')
        ->name('show-edit-form');

    Route::post('{id}/edit', 'CurrenciesController@edit')
        ->name('edit-currency');

    Route::get('{id}/delete', 'CurrenciesController@delete')
        ->name('delete-currency');
});
