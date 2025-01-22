<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        @if(Route::has('admin.users.index'))
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ route('admin.users.index') }}">
                                    Manage Users
                                </a>
                            </li>
                        @endif
                        @if(Route::has('admin.events.index'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.events.index') }}">
                                    Manage Events
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                @yield('content')
            </main>
        </div>
    </div>

    @vite('resources/js/app.js')
</body>
</html>
