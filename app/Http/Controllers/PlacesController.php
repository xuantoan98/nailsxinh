<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlacesController extends Controller
{
    public function index()
    {
        return view('places.index');
    }

    public function create()
    {
        return view('places.add');
    }

    public function store()
    {

    }
}
