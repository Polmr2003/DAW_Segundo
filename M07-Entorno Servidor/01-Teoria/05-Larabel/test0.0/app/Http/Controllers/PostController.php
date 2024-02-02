<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | GET
    |--------------------------------------------------------------------------
    | Larabel ya entiende que las vistas estan en /resources/views asi que no
    | hace falta poner toda la ruta completa
    */

    public function index()
    {
        return view('POSTS.index'); // en larabel no se pone la "/" en cambio se pone un punto
    }

    public function create()
    {
        return view('POSTS.create'); // en larabel no se pone la "/" en cambio se pone un punto
    }

    public function show($post)
    {
        return view('POSTS.show', [ // en larabel no se pone la "/" en cambio se pone un punto
            'prueba' => $post
        ]);
    }

    public function edit($post)
    {
        return view('POSTS.edit'); // en larabel no se pone la "/" en cambio se pone un punto
    }

    /*
    |--------------------------------------------------------------------------
    | post
    |--------------------------------------------------------------------------
    | Larabel ya entiende que las vistas estan en /resources/views asi que no
    | hace falta poner toda la ruta completa
    */

    public function store()
    {
        return "show";
    }

    /*
    |--------------------------------------------------------------------------
    | PUT
    |--------------------------------------------------------------------------
    | Larabel ya entiende que las vistas estan en /resources/views asi que no
    | hace falta poner toda la ruta completa
    */

    public function update($post)
    {
        return "show ($post)";
    }

    /*
    |--------------------------------------------------------------------------
    | DELELTE
    |--------------------------------------------------------------------------
    | Larabel ya entiende que las vistas estan en /resources/views asi que no
    | hace falta poner toda la ruta completa
    */

    public function destroy($post)
    {
        return "show ($post)";
    }

}
