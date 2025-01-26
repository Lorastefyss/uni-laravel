<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    @vite('resources/css/app.css')
</head>

<body class="">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">{{ config('app.name') }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    @if (user() && user()->role === 'admin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.index') }}">Admin Panel</a>
                            <!-- проверка има ли потребител и дали той е админ -->
                        </li>
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="nav-link" type="submit">Logout</button>
                            </form>
                        </li>
                    @endif
                    @if (!user())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login.index') }}">Login</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>


    <div class="container mt-4">
        @yield('content')
        <!-- когато правим изглед, който е споделен, използваме yield за да дефинираме секции(content) -->
    </div>
    @vite('resources/js/app.js')
</body>

</html>