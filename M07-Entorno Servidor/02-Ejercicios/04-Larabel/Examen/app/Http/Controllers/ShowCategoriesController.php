<?php

namespace App\Http\Controllers;

use App\Models\show_categories;
use App\Http\Requests\Storeshow_categoriesRequest;
use App\Http\Requests\Updateshow_categoriesRequest;
use App\Models\Categories;
use App\Models\Show;

class ShowCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $numero_random = rand(1, 10);

        $show = Show::find($numero_random);

        // Convertimos el resultado en una colección, independientemente de si se encontró o no el owner
        $show_collect = collect();
        if ($show) {
            $show_collect->push($show);
        }

        // cargamos las categorias de el show con la funcion de n:m com categorias
        $categoria_del_show = $show->categorias;


        // retornamos la vista donde visualizamos todos los owners i le pasamos los owners recojidos enteriormente con un array asociativo con la key owners
        return view("welcome", ['show' => $show_collect, 'categoria_del_show' => $categoria_del_show]);
    }

    /**
     * Display a listing of the resource.
     */
    public function list_info($id)
    {
        $show = Show::find($id);

        // Convertimos el resultado en una colección, independientemente de si se encontró o no el owner
        $show_collect = collect();
        if ($show) {
            $show_collect->push($show);
        }

        // cargamos las categorias de el show con la funcion de n:m com categorias
        $categoria_del_show = $show->categorias;


        // retornamos la vista donde visualizamos todos los owners i le pasamos los owners recojidos enteriormente con un array asociativo con la key owners
        return view("Options.Shows.List_info", ['show' => $show_collect, 'categoria_del_show' => $categoria_del_show]);
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
