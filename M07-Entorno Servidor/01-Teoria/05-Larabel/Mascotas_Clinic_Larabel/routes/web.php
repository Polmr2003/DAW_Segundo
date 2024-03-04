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

// cuando no ponga nada el usuario se ira al controlador OwnerController i nos ejecutara
// -> el metodo que le hemos puesto en este caso 'index'
Route::get('/', [OwnerController::class, 'index']);

Route::get('/Owner/search_by_id', [OwnerController::class, 'search_by_id'])->name('Owner.search_by_id');
Route::get('/Owner/search', [OwnerController::class, 'search'])->name('Owner.search');

// recurso owner con el crud, lo definimos con resource i el nombre del controlador, cuando lo creas ya te define
// -> las rutas con el nombre que le hallas puesto en este caso Owner i luego el metodo (Owner.index, etc...,
//-> Solamante te crea para los metodos que estan por defecto)
Route::resource('Owner', OwnerController::class);


// Si queremos crear la ruta para un metodo que hallamos creado nosotros (no los que estan por defecto):
//Route::get('/Owner/NombreDeLaRutaQueQueramosParaElMetodo', [App\Http\Controllers\OwnerController::class, 'Metodo'])->name('Owner.Metodo');
