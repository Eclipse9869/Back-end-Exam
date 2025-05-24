<!DOCTYPE html>
<html>
<head>
    <title>Book Rating App</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">📘 BookApp</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ route('books.index') }}">📚 Book List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('authors') ? 'active' : '' }}" href="{{ route('authors.index') }}">🧑‍💼 Top Authors</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('ratings/create') ? 'active' : '' }}" href="{{ route('ratings.create') }}">⭐ Rate Book</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    @stack('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
