<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Http\Requests\StoreCardRequest;
use App\Http\Requests\UpdateCardRequest;
use Illuminate\Http\Request;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cards = Card::all();

        // si no esta vacio
        if ($cards) {
            // Si no esta vacio la variable categori
            // Enviamos una respuesta con un código de estado 200 ("ok") y un objeto JSON con:
            // un booleno de error a false, un array de data con los categorias i enviamos un mensage de error
            return response()->json([
                'error' => false,
                'data' => $cards, // cuando utilizamos la funcion de n:m nos añade los datos relacionados de la tabla
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
            'title' => 'required|string',
            'content' => 'required|string',
            'trellolist_id' => 'required|integer',
        ]);

        // Creamos un nuevo comentario con los datos de la solicitud
        $card = new Card();

        $card->title = $request->input('title');
        $card->content = $request->input('content');
        $card->trellolist_id = $request->input('trellolist_id');

        // Guardamos el comentario en la base de datos
        $card->save();

        // Verificamos si el comentario se creó correctamente
        if ($card) {
            // Si no esta vacio la variable comments
            // Enviamos una respuesta con un código de estado 200 ("ok") y un objeto JSON con:
            // un booleno de error a false, un array de data con el comentario i enviamos un mensage de error
            return response()->json([
                'error' => false,
                'data' => $card,
                'message' => "Datos insertados en la base de datos exitosamente"
            ], 200);
        } else {
            // Si no esta vacio la variable comments
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
    public function show(card_label $card_label)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(card_label $card_label)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validamos lo que nos viene de la solicitud
        $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'trellolist_id' => 'required|integer',
        ]);

        // Creamos un nuevo comentario con los datos de la solicitud
        $card = Card::where('id', $id)->first();

        $card->title = $request->input('title');
        $card->content = $request->input('content');
        $card->trellolist_id = $request->input('trellolist_id');

        // Guardamos el comentario en la base de datos
        $card->update();

        // Verificamos si el comentario se creó correctamente
        if ($card) {
            // Si no esta vacio la variable comments
            // Enviamos una respuesta con un código de estado 200 ("ok") y un objeto JSON con:
            // un booleno de error a false, un array de data con el comentario i enviamos un mensage de error
            return response()->json([
                'error' => false,
                'data' => $card,
                'message' => "Datos actualizados en la base de datos exitosamente"
            ], 200);
        } else {
            // Si no esta vacio la variable comments
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
    public function destroy(card_label $card_label)
    {
        //
    }
}
