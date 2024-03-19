<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Show;
use Illuminate\Http\Request;
// use Illuminate\Http\Client\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // recojemos los datos
        $comments = Comment::all();

        if ($comments) {
            // Si no esta vacio la variable comments
            // Enviamos una respuesta con un código de estado 200 ("ok") y un objeto JSON con:
            // un booleno de error a false, un array de data con los comentarios i enviamos un mensage de error
            return response()->json([
                'error' => false,
                'data' => $comments,
                'message' => "Datos recojidos exitosamente"
            ], 200);
        } else {
            // Si esta vacio la variable comments
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
    public function view_comments_by_show(Request $request)
    {
        // Validamos lo que nos viene de la solicitud
        $request->validate([
            'show_id' => 'required|integer',
        ]);

        // Obtenemos todos los comentarios del show con el ID especificado
        $comments = Comment::with('show')->where('show_id', $request->input('show_id'))->get();

        if ($comments->isNotEmpty()) {
            // Si no esta vacio la variable comments
            // Enviamos una respuesta con un código de estado 200 ("ok") y un objeto JSON con:
            // un booleno de error a false, un array de data con los comentarios i enviamos un mensage de error
            return response()->json([
                'error' => false,
                'data' => $comments,
                'message' => "Datos recojidos exitosamente"
            ], 200);
        } else {
            // Si esta vacio la variable comments
            // Enviamos una respuesta con un código de estado 400 y un objeto JSON con:
            // un booleno de error a false, un array de data a null i enviamos un mensage de error
            return response()->json([
                'error' => true,
                'data' => null,
                'message' => "Error al obtener los datos o No hay datos"
            ], 400);
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
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
            'show_id' => 'required|integer',
            'titulo' => 'required|string',
            'descripcion' => 'required|string',
            'fecha' => 'required|date',
            'autor' => 'required|string',
        ]);

        // Creamos un nuevo comentario con los datos de la solicitud
        $comment = new Comment();

        $comment->show_id = $request->input('show_id');
        $comment->titulo = $request->input('titulo');
        $comment->descripcion = $request->input('descripcion');
        $comment->fecha = $request->input('fecha');
        $comment->autor = $request->input('autor');

        // Guardamos el comentario en la base de datos
        $comment->save();

        // Verificamos si el comentario se creó correctamente
        if ($comment) {
            // Si no esta vacio la variable comments
            // Enviamos una respuesta con un código de estado 200 ("ok") y un objeto JSON con:
            // un booleno de error a false, un array de data con el comentario i enviamos un mensage de error
            return response()->json([
                'error' => false,
                'data' => $comment,
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
    public function show(Comment $comment)
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
            'titulo' => 'required|string',
            'descripcion' => 'required|string',
            'fecha' => 'required|date',
            'autor' => 'required|string',
        ]);

        // Obtenemos el commentario que tenga la id que hemos obtenido
        $comment = Comment::where('id', $request->input('id'))->first();

        $comment->titulo = $request->input('titulo');
        $comment->descripcion = $request->input('descripcion');
        $comment->fecha = $request->input('fecha');
        $comment->autor = $request->input('autor');

        // Actualizamos el comentario
        $comment->update();

        // Verificamos si el comentario se creó correctamente
        if ($comment) {
            // Si no esta vacio la variable comments
            // Enviamos una respuesta con un código de estado 200 ("ok") y un objeto JSON con:
            // un booleno de error a false, un array de data con el comentario i enviamos un mensage de error
            return response()->json([
                'error' => false,
                'data' => $comment,
                'message' => "Datos actualizados exitosamente"
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
    public function destroy(Request $request)
    {
        // Validamos lo que nos viene de la solicitud
        $request->validate([
            'id' => 'required|integer',
        ]);

        // Obtenemos el commentario que tenga la id que hemos obtenido
        $comment = Comment::where('id', $request->input('id'))->first();

        // Actualizamos el comentario
        $comment->delete();

        // Verificamos si el comentario se creó correctamente
        if ($comment) {
            // Si no esta vacio la variable comments
            // Enviamos una respuesta con un código de estado 200 ("ok") y un objeto JSON con:
            // un booleno de error a false, un array de data con el comentario i enviamos un mensage de error
            return response()->json([
                'error' => false,
                'data' => $comment,
                'message' => "Datos eliminados exitosamente"
            ], 200);
        } else {
            // Si no esta vacio la variable comments
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
