<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\card_label;
use App\Http\Requests\Storecard_labelRequest;
use App\Http\Requests\Updatecard_labelRequest;
use Illuminate\Http\Request;

class CardLabelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $card_label = Card::with('label')->get();

        // si no esta vacio
        if ($card_label->isNotEmpty()) {
            // Si no esta vacio la variable categori
            // Enviamos una respuesta con un código de estado 200 ("ok") y un objeto JSON con:
            // un booleno de error a false, un array de data con los categorias i enviamos un mensage de error
            return response()->json([
                'error' => false,
                'data' => $card_label, // cuando utilizamos la funcion de n:m nos añade los datos relacionados de la tabla
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
            'card_id' => 'required|integer',
            'label_id' => 'required|integer',
        ]);

        // Creamos un nuevo comentario con los datos de la solicitud
        $card_label = new card_label();

        $card_label->card_id = $request->input('card_id');
        $card_label->label_id = $request->input('label_id');

        // Guardamos el comentario en la base de datos
        $card_label->save();

        // Verificamos si el comentario se creó correctamente
        if ($card_label) {
            // Si no esta vacio la variable comments
            // Enviamos una respuesta con un código de estado 200 ("ok") y un objeto JSON con:
            // un booleno de error a false, un array de data con el comentario i enviamos un mensage de error
            return response()->json([
                'error' => false,
                'data' => $card_label,
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(card_label $card_label)
    {
        //
    }
}
