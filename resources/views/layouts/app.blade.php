<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Your existing Vite assets -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-light">
        <!-- Responsive Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
            <div class="container">
                <!-- Brand -->
                <a class="navbar-brand fw-bold" href="{{ url('/') }}">
                    <span class="me-1">🔧</span> Support Tracker
                </a>
                
                <!-- Mobile Toggle Button -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" 
                        aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Collapsible Content -->
                <div class="collapse navbar-collapse" id="navbarContent">
                    <!-- Left-aligned Navigation -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('activities.index') ? 'active' : '' }}" 
                               href="{{ route('activities.index') }}">
                               📋 Activities
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('activities.create') ? 'active' : '' }}" 
                               href="{{ route('activities.create') }}">
                               ➕ Create Activity
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('activities.report') ? 'active' : '' }}" 
                               href="{{ route('activities.report') }}">
                               📊 Reports
                            </a>
                        </li>
                    </ul>

                    <!-- Right-aligned User Section -->
                    <ul class="navbar-nav ms-auto">
                        @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" 
                                data-bs-toggle="dropdown" aria-expanded="false">

                                    <span class="me-2">👤</span>

                                    <div class="d-flex flex-column">
                                        <span>{{ auth()->user()->name }}</span>
                                        <small class="text-light opacity-75">
                                            {{ auth()->user()->role ?? 'No role' }}
                                            ·
                                            {{ auth()->user()->department ?? 'No department' }}
                                        </small>
                                     </div>

                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="{{ route('profile.edit') }}">My Profile</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button class="dropdown-item text-danger" type="submit">
                                            🚪 Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <div class="container mt-4">
            <!-- Page Header (if exists) -->
            @isset($header)
                <header class="bg-white shadow-sm rounded mb-4 p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <h1 class="h3 mb-0 text-primary">{{ $header }}</h1>
                        @isset($headerButton)
                            {{ $headerButton }}
                        @endisset
                    </div>
                </header>
            @endisset

            <!-- Flash Messages (Optional - add if you use Laravel's session flashing) -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Main Content -->
            <main class="bg-white shadow-sm rounded p-4">
                @yield('content')
            </main>
        </div>

        <!-- Footer (Optional) -->
        <footer class="mt-5 py-3 bg-white border-top">
            <div class="container text-center text-muted">
                <small>&copy; {{ date('Y') }} Support Tracker. Built with Laravel & Bootstrap.</small>
            </div>
        </footer>

        <!-- Bootstrap JS Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        
        <!-- Optional: Bootstrap JS for interactive components -->
        <script>
            // Enable Bootstrap tooltips (if needed)
            document.addEventListener('DOMContentLoaded', function() {
                var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
                var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                    return new bootstrap.Tooltip(tooltipTriggerEl);
                });
            });
        </script>
        
        <!-- Your custom scripts -->
        @stack('scripts')
    </body>
</html>