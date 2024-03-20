<?php

use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ShowCategoriesController;
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

// verifiacacion con middleware Auth para ver si esta creado el token qye eso lo hace con sanctum
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// C: Create
Route::post('comment/create', [CommentController::class, 'store']);

// R: Read
Route::get('comment/get', [CommentController::class, 'index']);

// U: Update
Route::post('comment/update', [CommentController::class, 'update']);

// D: Delete
Route::post('comment/delete', [CommentController::class, 'destroy']);

//Other routes
// Route::post('comment/view_comments_by_show', [CommentController::class, 'view_comments_by_show']);
Route::get('comment/view_comments_by_show/{id}', [CommentController::class, 'view_comments_by_show']);


// Route::resource('comments', CommentController::class)->only([
//     'index', 'show', 'store', 'update', 'destroy'
// ]);

// Route::apiResource('posts', PostController::class)->except([
    //     'create',
    //     'show',
    //     'edit'
    // ]);
