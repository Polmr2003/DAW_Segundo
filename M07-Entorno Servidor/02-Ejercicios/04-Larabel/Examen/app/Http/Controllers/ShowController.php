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
        $show = Show::latest()->paginate(3);

        // retornamos la vista donde visualizamos todos los owners i le pasamos los owners recojidos enteriormente con un array asociativo con la key owners
        return view("Options.Shows.List_all", ['show' => $show]);
    }

    /**
     * Display a listing ShowCategoriesControllerof the resource.
     */
    public function list_by_price()
    {
        $show = Show::orderBy('precio', 'asc')->paginate(3);

        // retornamos la vista donde visualizamos todos los owners i le pasamos los owners recojidos enteriormente con un array asociativo con la key owners
        return view("Options.Shows.List_by_price", ['show' => $show]);
    }

    public function list_show_and_comment()
    {
        $show = Show::latest()->paginate(3);

        return view("Options.Shows.List_show_and_comment", ['show' => $show]);
    }

        /**
     * Display a listing of the resource.
     */
    public function list_comment($id)
    {
        $show = Show::find($id);

        // Convertimos el resultado en una colección, independientemente de si se encontró o no el owner
        $show_collect = collect();
        if ($show) {
            $show_collect->push($show);
        }

        // cargamos las categorias de el show con la funcion de n:m com categorias
        $comments = $show->comments;

        // retornamos la vista donde visualizamos todos los owners i le pasamos los owners recojidos enteriormente con un array asociativo con la key owners
        return view("Options.Shows.List_comments_by_show", ['show' => $show_collect, 'comments' => $comments]);
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
