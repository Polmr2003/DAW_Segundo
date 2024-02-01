<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | GET
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        return "index";
    }

    public function create()
    {
        return "Create";
    }

    public function show($post)
    {
        return "show ($post)";
    }

    public function edit($post)
    {
        return "edit ($post)";
    }

    /*
    |--------------------------------------------------------------------------
    | post
    |--------------------------------------------------------------------------
    */

    public function store()
    {
        return "show";
    }

    /*
    |--------------------------------------------------------------------------
    | PUT
    |--------------------------------------------------------------------------
    */

    public function update($post)
    {
        return "show ($post)";
    }

    /*
    |--------------------------------------------------------------------------
    | DELELTE
    |--------------------------------------------------------------------------
    */

    public function destroy($post)
    {
        return "show ($post)";
    }

}
