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

// cuando no ponga nada el usuario nos ira a la ruta que le halla puesto en este caso el controlador OwnerController
// -> i nos ejecutara el metodo que le hemos puesto en este caso 'index'
Route::get('/', [App\Http\Controllers\OwnerController::class, 'index']);

// recurso owner con el crud, lo definimos con resource i el nombre del controlador, cuando lo creas ya te define
// -> las rutas con el nombre que le hallas puesto en este caso Owner i luego el metodo (Owner.index, ...)
Route::resource('Owner', OwnerController::class);
