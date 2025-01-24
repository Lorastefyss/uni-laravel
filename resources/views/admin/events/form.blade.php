@extends('shared.admin')

@section('content')
<h2 class="mt-3">{{ $event->exists ? 'Edit' : 'Add' }} Event</h2>
<form method="POST" action="{{ $event->exists ? route('admin.events.update', $event) : route('admin.events.store') }}">
    @csrf

    @if ($event->exists)
        @method('put')
    @endif

    {{-- Name field --}}
    <div class="mb-3">
        <label for="name" class="form-label">Event Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
            value="{{ old('name', $event->name) }}" autocomplete="name" autofocus>
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    {{-- Year field --}}
    <div class="mb-3">
        <label for="year" class="form-label">Year</label>
        <input type="number" class="form-control @error('year') is-invalid @enderror" id="year" name="year"
            value="{{ old('year', $event->year) }}">
        @error('year')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    {{-- Type field --}}
    <div class="mb-3">
        <label for="type" class="form-label">Type of Event</label>
        <input type="text" class="form-control @error('type') is-invalid @enderror" id="type" name="type"
            value="{{ old('type', $event->type) }}">
        @error('type')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    {{-- Submit Button --}}
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">
            {{ $event->exists ? 'Update' : 'Add' }} Event
        </button>
    </div>
</form>
@endsection
