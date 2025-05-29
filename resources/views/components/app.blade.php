<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Anonymous Posts - Share your thoughts anonymously">
    <title>Anonymous Posts - @yield('title', 'Home')</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    
    <!-- Favicon -->
    <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>📝</text></svg>">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:rgb(17, 49, 97);">
        <div class="container">
            <a class="navbar-brand" href="{{ route('posts.index') }}">Anonymous Posts</a>
            
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="{{ route('posts.index') }}">Home</a>
                <a class="nav-link" href="{{ route('posts.create') }}">Submit Post</a>
                
                @auth
                    @if(Auth::user()->is_admin)
                        <a class="nav-link" href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
                    @endif
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-link nav-link" style="border: none; background: none;">Logout</button>
                    </form>
                @else
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                @endauth
            </div>
        </div>
    </nav>
    
    <!-- Admin Navigation (if admin is logged in) -->
    @auth
        @if(Auth::user()->is_admin)
            <nav class="navbar navbar-expand-lg navbar-dark admin-nav">
                <div class="container">
                    <div class="navbar-nav">
                        <a class="nav-link" href="{{ route('admin.dashboard') }}">Pending Posts</a>
                        <a class="nav-link" href="{{ route('admin.accepted') }}">Accepted Posts</a>
                        <a class="nav-link" href="{{ route('admin.declined') }}">Declined Posts</a>
                    </div>
                </div>
            </nav>
        @endif
    @endauth

    <!-- Main Content -->
    <div class="container">
        <div class="main-container">
            <!-- Flash Messages -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </div>

    {{$slot}}
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>