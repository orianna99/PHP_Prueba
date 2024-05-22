<?php

use App\Http\Controllers\DocumentoController;
use Illuminate\Support\Facades\Route;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/create', [DocumentoController::class, 'create'])->name('create');
Route::post('/delete/{id}', [DocumentoController::class, 'delete'])->name('delete');
Route::get('/document/{id}', [DocumentoController::class, 'document'])->name('document');
Route::post('/update', [DocumentoController::class, 'update'])->name('update');
