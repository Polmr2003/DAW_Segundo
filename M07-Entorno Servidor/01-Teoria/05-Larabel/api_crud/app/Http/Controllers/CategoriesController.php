<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Http\Requests\StoreCategoriesRequest;
use App\Http\Requests\UpdateCategoriesRequest;
use Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // recojemos los datos
        $categori = Categories::all();

        // si no esta vacio
        if ($categori->isNotEmpty()) {
            // Si no esta vacio la variable categori
            // Enviamos una respuesta con un código de estado 200 ("ok") y un objeto JSON con:
            // un booleno de error a false, un array de data con los categorias i enviamos un mensage de error
            return response()->json([
                'error' => false,
                'data' => $categori,
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
    public function store(Request $request)
    {
        // Validamos lo que nos viene de la solicitud
        $request->validate([
            'categoria' => 'required|string',
        ]);

        // Creamos un nuevo categoria con los datos de la solicitud
        $categori = new Categories();

        $categori->categoria = $request->input('categoria');

        // Guardamos la categoria en la base de datos
        $categori->save();

        // Verificamos si el categoria se creó correctamente
        if ($categori->isNotEmpty()) {
            // Si no esta vacio la variable categori
            // Enviamos una respuesta con un código de estado 200 ("ok") y un objeto JSON con:
            // un booleno de error a false, un array de data con el categoria i enviamos un mensage de error
            return response()->json([
                'error' => false,
                'data' => $categori,
                'message' => "Datos insertados en la base de datos exitosamente"
            ], 200);
        } else {
            // Si no esta vacio la variable categori
            // Enviamos una respuesta con un código de estado 400 y un objeto JSON con:
            // un booleno de error a false, un array de data a null i enviamos un mensage de error
            return response()->json([
                'error' => true,
                'data' => null,
                'message' => "Error al insertar los datos"
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Categories $categori)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // Validamos lo que nos viene de la solicitud
        $request->validate([
            'id' => 'required|integer',
            'categoria' => 'required|string',
        ]);

        // Obtenemos el commentario que tenga la id que hemos obtenido
        $categori = Categories::where('id', $request->input('id'))->first();

        $categori->categoria = $request->input('categoria');

        // Actualizamos el categoria
        $categori->update();

        // Verificamos si el categoria se creó correctamente
        if ($categori->isNotEmpty()) {
            // Si no esta vacio la variable categori
            // Enviamos una respuesta con un código de estado 200 ("ok") y un objeto JSON con:
            // un booleno de error a false, un array de data con el categoria i enviamos un mensage de error
            return response()->json([
                'error' => false,
                'data' => $categori,
                'message' => "Datos actualizados exitosamente"
            ], 200);
        } else {
            // Si no esta vacio la variable categori
            // Enviamos una respuesta con un código de estado 400 y un objeto JSON con:
            // un booleno de error a false, un array de data a null i enviamos un mensage de error
            return response()->json([
                'error' => true,
                'data' => null,
                'message' => "Error al actualizar los datos"
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        // Validamos lo que nos viene de la solicitud
        $request->validate([
            'id' => 'required|integer',
        ]);

        // Obtenemos el commentario que tenga la id que hemos obtenido
        $categori = Categories::where('id', $request->input('id'))->first();

        // Actualizamos el categoria
        $categori->delete();

        // Verificamos si el categoria se creó correctamente
        if ($categori->isNotEmpty()) {
            // Si no esta vacio la variable categori
            // Enviamos una respuesta con un código de estado 200 ("ok") y un objeto JSON con:
            // un booleno de error a false, un array de data con el categoria i enviamos un mensage de error
            return response()->json([
                'error' => false,
                'data' => $categori,
                'message' => "Datos eliminados exitosamente"
            ], 200);
        } else {
            // Si no esta vacio la variable categori
            // Enviamos una respuesta con un código de estado 400 y un objeto JSON con:
            // un booleno de error a false, un array de data a null i enviamos un mensage de error
            return response()->json([
                'error' => true,
                'data' => null,
                'message' => "Error al eliminar los datos"
            ], 400);
        }
    }
}
