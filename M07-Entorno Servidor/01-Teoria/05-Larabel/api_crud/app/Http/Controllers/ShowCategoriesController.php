<?php

namespace App\Http\Controllers;

use App\Models\show_categories;
use App\Http\Requests\Storeshow_categoriesRequest;
use App\Http\Requests\Updateshow_categoriesRequest;
use App\Models\Categories;
use App\Models\Show;
use Illuminate\Http\Request;

class ShowCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // recojemos un show random
        $numero_random = rand(1, 10);

        $show = Show::where('id', $numero_random)->first();

        // cojemos las categorias del show
        $show_categories = $show->categorias;

        // recojemos los datos
        //$show_categories = show_categories::all();

        // si no esta vacio
        if ($show_categories->isNotEmpty()) {
            // Si no esta vacio la variable categori
            // Enviamos una respuesta con un código de estado 200 ("ok") y un objeto JSON con:
            // un booleno de error a false, un array de data con los categorias i enviamos un mensage de error
            return response()->json([
                'error' => false,
                'show' => $show, // cuando utilizamos la funcion de n:m nos añade los datos relacionados de la tabla
                // 'categories' => $show_categories, // si le queremos pasar tambien las categorias
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
     * Display a listing of the resource.
     */
    public function list_info(Request $request)
    {
        // Validamos lo que nos viene de la solicitud
        $request->validate([
            'id' => 'required|integer',
        ]);

        // Obtenemos el show que tenga la id que hemos obtenido
        $show = Show::where('id', $request->input('id'))->first();

        // cojemos las categorias del show
        $show_categories = $show->categorias;

        // recojemos los datos
        //$show_categories = show_categories::all();

        // si no esta vacio
        if ($show_categories->isNotEmpty()) {
            // Si no esta vacio la variable categori
            // Enviamos una respuesta con un código de estado 200 ("ok") y un objeto JSON con:
            // un booleno de error a false, un array de data con los categorias i enviamos un mensage de error
            return response()->json([
                'error' => false,
                'show' => $show, // cuando utilizamos la funcion de n:m nos añade los datos relacionados de la tabla
                // 'categories' => $show_categories, // si le queremos pasar tambien las categorias
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
    public function store(Storeshow_categoriesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(show_categories $show_categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(show_categories $show_categories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updateshow_categoriesRequest $request, show_categories $show_categories)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(show_categories $show_categories)
    {
        //
    }
}
