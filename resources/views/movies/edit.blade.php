<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container text-center mt-4">
        <form action="{{ route('movies.update', $movie->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label class="mt-4">Ingrese el título de la película
                    <input type="text" name="title" placeholder="Título" class="form-control" value="{{ $movie->title }}">
                </label>
            </div>
            <div class="form-group">
                <label class="mt-4">Ingrese la restricción de edad
                    <input type="number" name="age_restriction" placeholder="Restricción de edad" min="0"
                        class="form-control"  value="{{ $movie->age_restriction }}">
                </label>
            </div>
            <div class="form-group">
                <label class="mt-4">Ingrese la duración de la película
                    <input type="number" name="duration" placeholder="Duración" min="0" step="0.01"
                        class="form-control" value="{{ $movie->duration }}">
                </label>
            </div>
            <div class="form-group">
                <label class="mt-4">Ingrese el valor de la película
                    <input type="number" name="value" placeholder="Valor" min="0" step="0.01"
                        class="form-control" value="{{ $movie->value }}">
                </label>
            </div>
            <button type="submit" class="btn btn-primary mt-4">Guardar</button>
        </form>
    </div>
</body>

</html>
