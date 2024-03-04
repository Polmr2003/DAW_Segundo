<?php

namespace App\Http\Controllers;

use App\Models\Show;
use Illuminate\Http\Request;

class ShowControllers extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $show = Show::latest()->paginate(3);

        // retornamos la vista donde visualizamos todos los owners i le pasamos los owners recojidos enteriormente con un array asociativo con la key owners
        return view("Options.Shows.home", ['show' => $show]);
    }

    /**
     * Display a listing of the resource.
     */
    public function show_data()
    {
        $show = Show::latest()->paginate(3);

        // retornamos la vista donde visualizamos todos los owners i le pasamos los owners recojidos enteriormente con un array asociativo con la key owners
        return view("Options.Shows.List_Shows", ['show' => $show]);
    }

    /**
     * Display a listing of the resource.
     */
    public function show_info(Request $request)
    {
        // recojemos el valor de el input con el id
        $id_owner = $request->input('id');

        // Buscamos el owner con el id que le hemos pasado
        $shows = Show::find($id_owner);

        //dd($shows);
        // Convertimos el resultado en una colección, independientemente de si se encontró o no el owner
        $owners = collect();
        if ($shows) {
            $owners->push($shows);
        }

        // retornamos la vista donde visualizamos todos los owners i le pasamos los owners recojidos enteriormente con un array asociativo con la key owners
        return view("Options.Shows.show_info", ['show' => $owners]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function comment()
    {
        $show = Show::latest()->paginate(3);

        return view("Options.Comments.coment", ['show' => $show]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function coment_form(Request $request)
    {
        // recojemos el valor de el input con el id
        $id_owner = $request->input('id');

        // Buscamos el owner con el id que le hemos pasado
        $shows = Show::find($id_owner);

        //dd($shows);
        // Convertimos el resultado en una colección, independientemente de si se encontró o no el owner
        $owners = collect();
        if ($shows) {
            $owners->push($shows);
        }
        return view("Options.Comments.coment_show", ['show' => $owners]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function update_val(Request $request)
    {
        $showss = Show::latest()->paginate(3);
        // recojemos el valor de el input con el id
        $id_owner = $request->input('id');

        $shows = Show::find($id_owner);

        // Actualizamos su nombre, su email i lo actualizamos en la base de datos
        $shows->valoracion = $request->input('valoracion');
        $shows->update();

        // luego de actualizar el owner vamos a el listado
        return redirect("");
    }


    /**
     * Show the form for creating a new resource.
     */
    public function modify_val(Request $request)
    {
        $show = Show::latest()->paginate(3);
        return view("Options.Comments.modify", ['show' => $show]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function view_com(Request $request)
    {
        $show = Show::latest()->paginate(3);

        // retornamos la vista donde visualizamos todos los owners i le pasamos los owners recojidos enteriormente con un array asociativo con la key owners
        return view("Options.Comments.list", ['show' => $show]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function view(Request $request)
    {
        // recojemos el valor de el input con el id
        $id_owner = $request->input('id');

        // Buscamos el owner con el id que le hemos pasado
        $shows = Show::find($id_owner);

        //dd($shows);
        // Convertimos el resultado en una colección, independientemente de si se encontró o no el owner
        $owners = collect();
        if ($shows) {
            $owners->push($shows);
        }

        // retornamos la vista donde visualizamos todos los owners i le pasamos los owners recojidos enteriormente con un array asociativo con la key owners
        return view("Options.Comments.show_coment", ['show' => $owners]);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function modify_form(Request $request)
    {
        // recojemos el valor de el input con el id
        $id_owner = $request->input('id');

        // Buscamos el owner con el id que le hemos pasado
        $shows = Show::find($id_owner);

        //dd($shows);
        // Convertimos el resultado en una colección, independientemente de si se encontró o no el owner
        $owners = collect();
        if ($shows) {
            $owners->push($shows);
        }
        return view("Options.Comments.modify_form", ['show' => $owners]);
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
    public function update(Request $request, Show $show)
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
