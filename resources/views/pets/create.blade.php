<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Nueva Mascota</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-success text-white">
                        <h4 class="mb-0">📝 Registrar Mascota</h4>
                    </div>
                    <div class="card-body">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('pets.store') }}" method="POST">
                            @csrf <div class="mb-3">
                                <label for="name" class="form-label">Nombre de la Mascota:</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" placeholder="Ej: Firulais">
                            </div>

                            <div class="mb-3">
                                <label for="species" class="form-label">Especie:</label>
                                <input type="text" name="species" id="species" class="form-control" value="{{ old('species') }}" placeholder="Ej: Perro, Gato...">
                            </div>

                            <div class="mb-3">
                                <label for="age" class="form-label">Edad (años):</label>
                                <input type="number" name="age" id="age" class="form-control" value="{{ old('age') }}" placeholder="Ej: 3">
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('pets.index') }}" class="btn btn-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-success">Guardar Mascota</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>