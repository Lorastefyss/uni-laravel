@extends('shared.admin')

@section('content')
<div class="d-flex justify-content-between mt-3">
    <h2>Events Management</h2>
    <div>
        <a class="btn btn-success btn-sm" href="{{ route('admin.events.create') }}">Add Event</a>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Year</th>
                <th>Type</th>
                <th>Created On</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
                <tr>
                    <td>{{ $event->id }}</td>
                    <td>{{ $event->name }}</td>
                    <td>{{ $event->year }}</td>
                    <td>{{ $event->type }}</td>
                    <td>{{ $event->created_at->toFormattedDateString() }}</td>
                    <td>
                        <a href="{{ route('admin.events.edit', $event) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('admin.events.destroy', $event) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $events->links() }} <!-- Pagination links -->
</div>
@endsection
