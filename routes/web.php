<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::middleware('auth')->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/contacts', [App\Http\Controllers\ContactController::class, 'index'])->name('contacts');

    Route::get('/create', [App\Http\Controllers\ContactController::class, 'Add'])->name('create');
    Route::POST('create', [App\Http\Controllers\ContactController::class, 'save' ])->name('save');

    Route::get('edit/{id}', [App\Http\Controllers\ContactController::class, 'edit'])->name('edit');
    Route::post('edit/{id}', [App\Http\Controllers\ContactController::class, 'update'])->name('update');

    Route::get('delete/{id}', [App\Http\Controllers\ContactController::class, 'delete'])->name('delete');
    Route::POST('delete/{id}', [App\Http\Controllers\ContactController::class, 'DeleteContact']);
});