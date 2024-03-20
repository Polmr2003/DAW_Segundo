<?php

namespace App\Http\Controllers;

use App\Models\Trellolist;
use App\Http\Requests\StoreTrellolistRequest;
use App\Http\Requests\UpdateTrellolistRequest;

class TrellolistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreTrellolistRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Trellolist $trellolist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Trellolist $trellolist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTrellolistRequest $request, Trellolist $trellolist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Trellolist $trellolist)
    {
        //
    }
}
