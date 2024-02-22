<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;
use Psy\Readline\Hoa\Console;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // recojemos descendentemente todos los owners de la base de datos por orden de fecha (created_at)
        //$owners = Owner::latest()->get();

        // recojemos todos los owners de la base de datos
        $owners = Owner::all();

        // retornamos la vista donde visualizamos todos los owners i le pasamos los owners recojidos enteriormente con un array asociativo con la key owners
        return view("Options.Owner.List_Owner", ['owners' => $owners]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Options.Owner.Create_Owner");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // creamos el owner en solo una linea
        //Owner::create($request->all());

        // creamos el owner cojiendo los valores del input
        $Owner = new Owner();
        $Owner->name = $request->input('name');
        $Owner->email = $request->input('email');
        $Owner->save();

        // luego de crear el owner volvemos a la pantalla anterior (create)
        //return redirect()->back();

        // luego de crear el owner vamos a el listado
        return redirect("Owner");
    }

    /**
     * Display the specified resource.
     */
    public function show(Owner $owner)
    {
        // recojemos descendentemente todos los owners de la base de datos por orden de fecha (created_at)
        //$owners = Owner::latest()->get();

        // recojemos todos los owners de la base de datos
        $owners = Owner::all();

        // retornamos la vista donde visualizamos todos los owners i le pasamos los owners recojidos enteriormente con un array asociativo con la key owners
        return view("Options.Owner.List_Owner", ['owners' => $owners]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Owner $owner)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Buscamos el owner con el id que le hemos pasado
        $Owner = Owner::find($id);

        // Actualizamos su nombre, su email i lo actualizamos en la base de datos
        $Owner->name = $request->input('name');
        $Owner->email = $request->input('email');
        $Owner->update();

        // luego de actualizar el owner vamos a el listado
        return redirect("Owner");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Owner $owner, $id)
    {
        // Buscamos el owner con el id que le hemos pasado
        $Owner = Owner::find($id);

        // borramos el usuario
        $Owner->delete();

        // luego de actualizar el owner vamos a el listado
        return redirect("Owner");

    }
}
