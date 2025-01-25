@extends('shared.admin')

@section('content')
<h2 class="mt-3">{{ $event->exists ? 'Edit' : 'Add' }} Event</h2>
<form method="POST" action="{{ $event->exists ? route('admin.events.update', $event) : route('admin.events.store') }}"
    enctype="multipart/form-data">
    @csrf

    @if ($event->exists)
        @method('put')
    @endif

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

    <div class="mb-3">
        <label for="files" class="form-label">Upload Files</label>
        <input type="file" class="form-control @error('files.*') is-invalid @enderror" id="files" name="files[]"
            multiple accept=".jpg, .jpeg, .png">
        @error('files.*')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    @if ($event->exists && $event->archives->isNotEmpty())
        <h4>Current Files:</h4>
        <div class="d-flex flex-wrap">
            @foreach ($event->archives as $archive)
                @if (in_array(strtolower(pathinfo($archive->file_name, PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png']))
                    <div class="m-2 text-center">
                        <img src="{{ asset($archive->file_name) }}" alt="archive" style="width: 100px; height: 100px; object-fit: contain;">
                        <div>
                            <a class="btn btn-danger btn-sm mt-3" href="{{ route('admin.archives.destroy', $archive) }}">Delete</a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    @endif

    {{-- Submit Button --}}
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">
            {{ $event->exists ? 'Update' : 'Add' }} Event
        </button>
    </div>
</form>
@endsection