@extends('shared.layout')

@section('content')

<h1>Events</h1>

@if($records->isEmpty())
    <div class="alert alert-info">No events found.</div>
@else
    <ul>
        @foreach($records as $event)
            <li>{{ $event->name }} - {{ $event->description }}</li>
        @endforeach
    </ul>
    {{ $records->links() }}
@endif

@endsection