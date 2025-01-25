@extends('shared.layout')

@section('content')

<div class="container mt-4">
    <div class="mb-3">
        <a href="{{ route('client.index') }}" class="btn btn-secondary">← Back</a>
    </div>

    <h2>Title: {{ $event->title }}</h2>
    <h3>Type: {{ $event->type }}</h3>
    <h3>Year: {{ $event->year }}</h3>

    <div class="mt-4">
        <h4>Archives</h4>
        @if($event->archives->isEmpty())
            <p>No archives to display.</p>
        @else
            <div class="row">
                @foreach($event->archives as $archive)
                    <div class="col-md-3">
                        <div class="card mb-4">
                            <img class="card-img-top" src="{{ asset($archive->file_name) }}" alt="Archive image"
                                style="width: 100%; height: 200px; object-fit: contain;">
                            <div class="card-body">
                                <p class="card-text">{{ $archive->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>

@endsection