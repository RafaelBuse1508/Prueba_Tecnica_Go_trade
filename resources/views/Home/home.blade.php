<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }
        .user-info {
            margin-bottom: 1.5rem;
        }
        .btn-custom {
            width: 200px;
            margin: 10px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="{{ session('user')['avatar'] ?? asset('default-avatar.png') }}" alt="Avatar" class="avatar" style="width: 40px; height: 40px; border-radius: 50%;">
                BIENVENIDO, {{ session('user')['name'] ?? 'Guest' }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-danger">Cerrar sesión</button>
            </form>
        </div>
    </nav>


        <div class="text-center">
            <div class="user-info">
                <img src="{{ session('user')['avatar'] ?? 'default-avatar.png' }}" alt="Avatar" class="avatar">
                <h3>{{ session('user')['name'] }}</h3>
                <p>{{ session('user')['email'] }}</p>
            </div>
            <a href="{{ route('agregar_establecimiento') }}" class="btn btn-primary btn-custom">Agregar un establecimiento</a>
            <a href="{{ route('listar_establecimiento') }}" class="btn btn-primary btn-custom">Listar establecimientos</a>

        </div>
    </div>
</body>
</html>
