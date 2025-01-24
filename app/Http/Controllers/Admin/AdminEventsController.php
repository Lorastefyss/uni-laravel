<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Http\Requests\Admin\EventRequest;
use Illuminate\Http\Request;

class AdminEventsController extends Controller
{
    public function index()
    {
        $events = Event::paginate(15);
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        $event = new Event();
        return view('admin.events.form', compact('event'));
    }

    public function store(EventRequest $request)
    {
        $data = $request->validated();
        Event::create($data);
        return redirect()->route('admin.events.index');
    }

    public function edit(Event $event)
    {
        return view('admin.events.form', compact('event'));
    }

    public function update(EventRequest $request, Event $event)
    {
        $data = $request->validated();
        $event->update($data);
        return redirect()->route('admin.events.index');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('admin.events.index');
    }
}
