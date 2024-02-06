<?php

use App\Http\Controllers\PostController;
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

$post = [
    ['title' => '1r post'],
    ['title' => '2n post'],
    ['title' => '3r post'],
    ['title' => '4t post'],
];

// // cuando el usuario no pone nada ("/") nos redirigira a cursos ("/cursos") || para que esto funcione hay que comentar la linea get que tenga la /
// Route::redirect('/', 'posts');

// Route::view(direccion en la URL, Nombre de la Vista, cotenido que le pasamos a la vista)->name(Nombre que nos referiremos a esta vista);
Route::view('/', 'Layouts.app')->name('home');
Route::view('/listar', 'Options.List')->name('listar');
Route::view('/buscar', 'Options.Buscar', ['post' => $post])->name('buscar');
Route::view('/modificar', 'Options.Modificar')->name('modificar');

// Route::get('/buscar', function () {
//     $post = [
//         ['title' => '1r post'],
//         ['title' => '2n post'],
//         ['title' => '3r post'],
//         ['title' => '4t post'],
//     ];

//     return view('Options.Buscar', ['post' => $post]);
// })->name('buscar');

// // cuando el usuario no pone nada ("/") nos redirigira aqui
// Route::get('/', function () {
//     return view('welcome');
//     // return "Bienvenido a la paguina web";
// });

// // cuando el usuario pone cursos ("/cursos") nos redirigira aqui
// Route::get('cursos', function () {
//     return "Bienvenido a cursos";
// });

// // cuando el usuario pone ("/cursos/create") nos redirigira aqui
// Route::get('cursos/create', function () {
//     return "Bienvenido a cursos create";
// });

// // cuando el usuario pone cursos ("/cursos/{curso}/{categoria}") nos redirigira aqui || si queremos que sea opcional algo le tenemos que poner "?"
// Route::get('cursos/{curso}/{categoria?}', function ($curso, $categoria = null) {
//     // si la variable de categoria esta en null pondremos solo el curso
//     if ($categoria != null) {
//         return "Bienvenido al curso: $curso, de la categoria: $categoria";
//     } else {
//         return "Bienvenido al curso: $curso";
//     }
// });

/*
|--------------------------------------------------------------------------
| Protect routes with regular expresions
|--------------------------------------------------------------------------
*/

// Route::get('cursos/{curso}', function ($curso) {
//     return "Bienvenido al curso: $curso";
// })->where('curso', '[A-Za-z]+'); // para poner dos restricciones: ->where(['curso' => '[0-9]+', 'categoria' => '[a-z]+'])



/*
|--------------------------------------------------------------------------
| GET
|--------------------------------------------------------------------------
*/

// Route::get('/posts', PostController::class)->name('posts.index');
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.crate');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');

/*
|--------------------------------------------------------------------------
| POST
|--------------------------------------------------------------------------
*/

Route::post('/post', [PostController::class, 'store'])->name('posts.store');

/*
|--------------------------------------------------------------------------
| PUT
|--------------------------------------------------------------------------
*/

Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');

/*
|--------------------------------------------------------------------------
| DELETE
|--------------------------------------------------------------------------
*/

Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

/*
|--------------------------------------------------------------------------
| RESOURCE
|--------------------------------------------------------------------------
*/

// Only
// Route::resource('/posts', PostController::class)->only(['index']);

// // Except
// Route::resource('/posts', PostController::class)->except(['index']);
