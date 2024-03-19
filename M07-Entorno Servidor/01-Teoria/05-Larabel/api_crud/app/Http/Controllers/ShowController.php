<?php

namespace App\Http\Controllers;

use App\Models\Show;
use App\Http\Requests\StoreShowRequest;
use App\Http\Requests\UpdateShowRequest;

class ShowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shows = Show::all();

        if ($shows) {
            // Si no esta vacio la variable categori
            // Enviamos una respuesta con un código de estado 200 ("ok") y un objeto JSON con:
            // un booleno de error a false, un array de data con los categorias i enviamos un mensage de error
            return response()->json([
                'error' => false,
                'data' => $shows,
                'message' => "Datos recojidos exitosamente"
            ], 200);
        } else {
            // Si esta vacio la variable categori
            // Enviamos una respuesta con un código de estado 400 y un objeto JSON con:
            // un booleno de error a false, un array de data a null i enviamos un mensage de error
            return response()->json([
                'error' => true,
                'data' => null,
                'message' => "Error al obtener los datos"
            ], 400);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreShowRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Show $show)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Show $show)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateShowRequest $request, Show $show)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Show $show)
    {
        //
    }
}
