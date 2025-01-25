@extends('shared.layout')

@section('content')

<h1>Events</h1>

<form action="{{ route('client.index') }}" method="GET" class="d-flex align-items-center gap-2 w-100 mb-3">
    <div class="form-group" style="width: 45%">
        <label for="name" class="sr-only">Name</label>
        <input type="text" class="form-control w-100" id="name" name="name" placeholder="Search by name"
            value="{{ request('name') }}">
    </div>
    <div class="form-group" style="width: 45%">
        <label for="type" class="sr-only">Type</label>
        <select class="form-control w-100" id="type" name="type">
            <option value="">Select Type</option>
            @foreach($eventTypes as $type)
                <option value="{{ $type }}" {{ request('type') == $type ? 'selected' : '' }}>{{ $type }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary" style="width: 10%">Search</button>
</form>

@if($records->isEmpty())
    <div class="alert alert-info">No events found.</div>
@else
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>Year</th>
                <th>Archives Count</th>
                <th>Details</th>
            </tr>
        </thead>
        <tbody>
            @foreach($records as $event)
                <tr>
                    <td>{{ $event->name }}</td>
                    <td>{{ $event->type }}</td>
                    <td>{{ $event->year }}</td>
                    <td>{{ $event->archives->count() }}</td>
                    <td><a href="{{ route('client.show', $event) }}" class="btn btn-primary">Details</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $records->links() }}
@endif

@endsection