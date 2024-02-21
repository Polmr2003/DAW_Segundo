<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\OwnerController;


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

// recurso owner con el crud
Route::resource('Owner', OwnerController::class);

// Route::view('/buscar', 'Options.Buscar', ['post' => $post])->name('buscar');
// Route::view('/modificar', 'Options.Modificar')->name('modificar');
