<?php

namespace App\Http\Controllers;

use App\Models\Event;

class HomeController extends Controller
{
    public function index()
    {
        $records = Event::paginate(15);

        return view('home.index', compact('records'));
    }

    public function create()
    {
        $record = new Event();

        return view('home.form', compact('record'));
    }
}