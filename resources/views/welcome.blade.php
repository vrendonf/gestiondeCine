<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container text-center">
        <h1>Aplicativo web para gestión de salas de cine</h1>
        <ul>
            <il><a href="{{ route('movies.index') }}" class="btn btn-warning">Gestionar películas</a></il>
            <il><a href="{{ route('rooms.index') }}" class="btn btn-warning">Gestionar salas</a></il>
            <il><a href="{{ route('sales.index') }}" class="btn btn-warning">Gestionar ventas</a></il>
        </ul>
            
        
    </div>
</body>
</html>
