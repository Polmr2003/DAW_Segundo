<?php

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

Route::view('/', 'Layouts.app')->name('home');
// Route::view('/listar', 'Options.List')->name('listar');
// Route::view('/buscar', 'Options.Buscar', ['post' => $post])->name('buscar');
// Route::view('/modificar', 'Options.Modificar')->name('modificar');
