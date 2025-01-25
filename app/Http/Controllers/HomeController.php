<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $query = Event::query();

        $name = $request->query('name');
        $type = $request->query('type');

        if ($name) {
            $query->where('name', 'like', '%' . $name . '%');
        }

        if ($type) {
            $query->where('type', $type);
        }

        $eventTypes = Event::distinct()->pluck('type')->toArray();
        $records = $query->orderBy('created_at', 'desc')->paginate(15);

        return view('home.index', compact('records', 'eventTypes'));
    }

    public function show(Event $event)
    {
        return view('home.show', compact('event'));
    }
}