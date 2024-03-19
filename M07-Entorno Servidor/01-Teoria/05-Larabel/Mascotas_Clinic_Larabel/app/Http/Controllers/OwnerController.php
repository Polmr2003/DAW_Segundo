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

        // recojemos descendentemente todos los owners de la base de datos por orden de fecha (created_at) i lo ponemos con paginate
        // -> paginate no funciona con all() solo con latest()
        $owners = Owner::latest()->paginate(5);

        // retornamos la vista donde visualizamos todos los owners i le pasamos los owners recojidos enteriormente con un array asociativo con la key owners
        return view("Options.Owner.List_Owner", ['owners' => $owners]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // cojemos los valores de el enum i se lo pasamos a la vista
        $options = Owner::getStatusOptions();

        return view("Options.Owner.Create_Owner", ['enum' => $options]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // creamos el owner en solo una linea
        //Owner::create($request->all());

        // validaciones
        $request->validate([
            'name' => 'required|string',
            'email' => 'required',
            'sexe' => 'required'
        ]);

        // creamos el owner cojiendo los valores del input
        $Owner = new Owner();
        $Owner->name = $request->input('name');
        $Owner->email = $request->input('email');
        $Owner->sexe = $request->input('sexe');
        $Owner->save();

        // luego de crear el owner volvemos a la pantalla anterior (create)
        //return redirect()->back();

        // luego de crear el owner vamos a el listado i le pasamos como variable de session un key secces con valor con un mensaje exitoso
        return redirect("Owner")->with('success', 'Propietario creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Owner $owner)
    {
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
        $owner = Owner::find($id);

        // borramos el usuario
        $owner->delete();

        // luego de actualizar el owner vamos a el listado i le pasamos como variable de session un key secces con valor con un mensaje exitoso
        return redirect("Owner")->with('success', 'Propietario eliminado exitosamente');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function search_by_id()
    {
        return view("Options.Owner.Search_Owner");
    }

    public function search(Request $request)
    {
        // recojemos el valor de el input con el id
        $id_owner = $request->input('id');

        // Buscamos el owner con el id que le hemos pasado
        $owner = Owner::find($id_owner);

        // Convertimos el resultado en una colección, independientemente de si se encontró o no el owner
        $owners = collect();
        if ($owner) {
            $owners->push($owner);
        }

        // Retornamos la vista pasando la colección de owners
        return view("Options.Owner.Owner", ['owner_find' => $owners]);
    }
}
