<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('item', \App\Http\Controllers\ItemsController::class);

// Route::post('item', [\App\Http\Controllers\ItemsController::class, 'store'])->name('item.store');

// Route::get('item/{id}', [\App\Http\Controllers\ItemsController::class, 'show'])->name('item.show');

// Route::put('item/{id}', [\App\Http\Controllers\ItemsController::class, 'update'])->name('item.update');

// Route::delete('item/{id}', [\App\Http\Controllers\ItemsController::class, 'delete'])->name('item.delete');

Route::get('getUser', [App\Http\Controllers\ItemsController::class, 'getUser']);

Route::get('getItem', [App\Http\Controllers\ItemsController::class, 'getItem']);
