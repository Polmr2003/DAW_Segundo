<?php

use App\Http\Controllers\CardController;
use App\Http\Controllers\CardLabelController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Read and add de cards
Route::resource('cards ', CardController::class)->only([
    'index',
    'store'
]);

// Update card
Route::put('/cards/{id}', [CardController::class, 'update']);



// Read and add de labels
Route::resource('labels ', CardLabelController::class)->only([
    'index',
    'store'
]);

