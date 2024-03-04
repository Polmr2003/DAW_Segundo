<?php

use App\Http\Controllers\ShowControllers;
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

// cuando no ponga nada el usuario se ira al controlador OwnerController i nos ejecutara
// -> el metodo que le hemos puesto en este caso 'index'
Route::get('/', [ShowControllers::class, 'index'])->name('home');

Route::get('/show', [ShowControllers::class, 'show_data'])->name('show.list');

Route::get('/showinfo', [ShowControllers::class, 'show_info'])->name('show.info');

Route::get('/coment', [ShowControllers::class, 'comment'])->name('show.comment');

Route::get('/coment_form', [ShowControllers::class, 'coment_form'])->name('show.coment_form');

Route::get('/update_val', [ShowControllers::class, 'update_val'])->name('show.update_val');

Route::get('/modify_val', [ShowControllers::class, 'modify_val'])->name('show.modify_val');

Route::get('/modify_form', [ShowControllers::class, 'modify_form'])->name('show.modify_form');

Route::get('/view_com', [ShowControllers::class, 'view_com'])->name('show.view_com');

Route::get('/view', [ShowControllers::class, 'view'])->name('show.view');

Route::resource('Show', ShowControllers::class);
