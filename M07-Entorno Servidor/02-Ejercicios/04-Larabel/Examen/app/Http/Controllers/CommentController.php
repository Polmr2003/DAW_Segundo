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
        $show = Show::latest()->paginate(3);

        return view("Options.Comments.Comment_show", ['show' => $show]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $show = Show::find($id);

        // Convertimos el resultado en una colección, independientemente de si se encontró o no el owner
        $show_collect = collect();
        if ($show) {
            $show_collect->push($show);
        }

        return view("Options.Comments.Add_comment", ['show' => $show_collect]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // recojemos los valores de los inputs
        $comment = new Comment();

        $comment->show_id = $request->input('id');
        $comment->titulo = $request->input('titulo');
        $comment->descripcion = $request->input('descripcion');
        $comment->fecha = $request->input('fecha');
        $comment->autor = $request->input('autor');

        // guaradamos el comment en la base de datos
        $comment->save();

        // redireccionamos a la vista de comentar los shows
        return redirect()->route('comment.comment_show')->with('success', 'Comentario creado exitosamente');
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
    public function update_view()
    {
        // Obtenemos todos los comentarios con la relación show cargada
        $comments = Comment::with('show')->get();

        return view("Options.Comments.Update_view", ['comment'=>$comments]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $comment = Comment::find($id);

        // Convertimos el resultado en una colección, independientemente de si se encontró o no el owner
        $comment_collect = collect();
        if ($comment) {
            $comment_collect->push($comment);
        }

        return view("Options.Comments.Update_comment", ['comment' => $comment_collect]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->input('id');

        // recojemos los valores de los inputs
        $comment = Comment::find($id);

        $comment->titulo = $request->input('titulo');
        $comment->descripcion = $request->input('descripcion');
        $comment->fecha = $request->input('fecha');
        $comment->autor = $request->input('autor');

        // guaradamos el comment en la base de datos
        $comment->update();

        // 
        return redirect()->route('comment.update_view')->with('success', 'Comentario Actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
