<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistema de Mascotas')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex flex-column min-vh-100">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('pets.index') }}">🐾 Sistema de Mascotas</a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link text-white me-3" href="{{ route('pets.index') }}">📋 Listado</a>
                <a class="btn btn-outline-light btn-sm" href="{{ route('pets.create') }}">+ Nueva Mascota</a>
            </div>
        </div>
    </nav>

    <main class="container py-5">
        @yield('content')
    </main>

    <footer class="bg-white text-center py-3 text-muted border-top mt-auto">
        <div class="container">
            <small>Programación III - Universidad Tecnológica Nacional (UTN)</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>