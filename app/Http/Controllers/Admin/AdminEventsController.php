<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Archive;
use Storage;
use App\Http\Requests\Admin\EventRequest;

class AdminEventsController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('created_at', 'desc')->paginate(15);
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
        $event = Event::create($data);

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $filename = $file->getClientOriginalName();
                $path = $file->move(public_path('uploads'), $filename);
        
                $event->archives()->create([
                    'file_name' => 'uploads/' . $filename,
                    'file_date' => now(),
                ]);
            }
        }

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

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $filename = $file->getClientOriginalName();
                $path = $file->move(public_path('uploads'), $filename);
        
                $event->archives()->create([
                    'file_name' => 'uploads/' . $filename,
                    'file_date' => now(),
                ]);
            }
        }

        return redirect()->route('admin.events.index');
    }

    public function deleteArchive(Archive $archive)
    {
        Storage::disk('public')->delete($archive->file_name);
        $archive->delete();

        return back()->with('success', 'File deleted successfully.');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('admin.events.index');
    }
}
