<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function index()
    {
        $users = Event::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.users.index', compact('users'));
    }
}
