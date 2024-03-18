<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ShowCategoriesController;
use App\Http\Controllers\ShowController;
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

// ShowController
Route::get('/show_list_all', [ShowController::class, 'index'])->name('show.list_all');
Route::get('/show_list_by_price', [ShowController::class, 'list_by_price'])->name('show.list_by_price');
Route::get('/list_show_and_comment', [ShowController::class, 'list_show_and_comment'])->name('show.list_show_and_comment');

Route::get('/view_comments{id}', [ShowController::class, 'list_comment'])->name('show.view_comments');

// ShowCategoriesController
Route::get('/', [ShowCategoriesController::class, 'index'])->name('home');

Route::get('/show/{id}', [ShowCategoriesController::class, 'list_info'])->name('show.list_info');

// CategoriesController
Route::get('/list_categorias', [CategoriesController::class, 'index'])->name('categories.list');

// CommentController
Route::get('/comment_show', [CommentController::class, 'index'])->name('comment.comment_show');
Route::get('/comment/{id}', [CommentController::class, 'create'])->name('comment.add_comment');
Route::get('/add_comment', [CommentController::class, 'store'])->name('comment.store_comment');

Route::get('/update_view', [CommentController::class, 'update_view'])->name('comment.update_view');
Route::get('/update_form{id}', [CommentController::class, 'edit'])->name('comment.update_form');
Route::get('/update_comment', [CommentController::class, 'update'])->name('comment.update_comment');


