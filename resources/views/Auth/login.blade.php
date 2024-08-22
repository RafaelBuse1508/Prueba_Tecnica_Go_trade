<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>LOGIN GO TRADE</title>
    <style>
        .login-container {
            max-width: 400px;
            margin: auto;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .login-header img {
            max-width: 150px;
            margin-bottom: 1.5rem;
        }
        .login-header h2 {
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
<div class="login-container mt-5">
        <div class="login-header">
            <img src="{{ asset('imgs/go_trade_logo.jpg') }}" alt="Logo">
            <h2>Login</h2>
            <p>Ingrese sus credenciales para acceder</p>
        </div>
        
        <form action="{{ url('/login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
                <!-- Mensajes de error para el email -->
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" required>
                <!-- Mensajes de error para la contraseña -->
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
    </div>
</body>
</html>