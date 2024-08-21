<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Película</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container text-center mt-4">
        <form action="{{ route('movies.update', $movie) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label class="mt-4">Título de la película
                    <input type="text" name="title" value="{{ $movie->title }}" class="form-control">
                </label>
            </div>
            <div class="form-group">
                <label class="mt-4">Restricción de edad
                    <input type="number" name="age_restriction" value="{{ $movie->age_restriction }}" min="0" class="form-control">
                </label>
            </div>
            <div class="form-group">
                <label class="mt-4">Duración de la película
                    <input type="number" name="duration" value="{{ $movie->duration }}" min="0" step="0.01" class="form-control">
                </label>
            </div>
            <div class="form-group">
                <label class="mt-4">Valor de la película
                    <input type="number" name="value" value="{{ $movie->value }}" min="0" step="0.01" class="form-control">
                </label>
            </div>
            <button type="submit" class="btn btn-primary mt-4">Actualizar</button>
        </form>
    </div>
</body>
</html>
