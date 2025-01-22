@extends('shared.admin')

@section('content')
<h2 class="mt-3">{{ $user->exists ? 'Edit' : 'Add' }} user</h2>
<form method="POST" action="{{ $user->exists ? route('admin.update', $user) : route('admin.store') }}">
    @csrf

    @if ($user->exists)
        @method('put')
    @endif

    {{-- Name field --}}
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
            value="{{ old('name', $user->name) }}" autocomplete="name" autofocus>
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    {{-- Email field --}}
    <div class="mb-3">
        <label for="email" class="form-label">Email Address</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
            value="{{ old('email', $user->email) }}" autocomplete="email">
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    {{-- Password field --}}
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
            name="password" autocomplete="new-password">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    {{-- Confirm Password field --}}
    <div class="mb-3">
        <label for="password-confirm" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" id="password-confirm" name="password_confirmation"
            autocomplete="new-password">
    </div>

    {{-- Submit Button --}}
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">
            {{ $user->exists ? 'Edit' : 'Add'}} user
        </button>
    </div>
</form>
@endsection