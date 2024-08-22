<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Lista de Establecimientos</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <style>
                .header {
            display: flex;
            align-items: center;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 10px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
            position: fixed; /* Fija el header en la parte superior */
            width: 100%;
            top: 0;
            left: 0;
            z-index: 1000; /* Asegura que el header esté por encima de otros elementos */
            justify-content: space-between;
        }

        .header h1 {
            margin: 0;
            font-size: 20px; /* Ajusta el tamaño de la fuente aquí */
        }

        .logout-button {
            background-color: #dc3545;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            text-decoration: none;
            cursor: pointer;
            font-size: 16px; /* Ajusta el tamaño de la fuente del botón aquí */
            margin-left: 800px; /* Añade margen izquierdo para ajustar la posición */
        }

        .logout-button:hover {
            background-color: #c82333;
        }
        /* Puedes agregar estilos personalizados aquí */
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
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
    <div class="container">
        @if(isset($error))
            <p>{{ $error }}</p>
        @else
            <h1>Lista de Establecimientos</h1>
            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Dirección</th>
                        <th>Teléfonos de Contacto</th>
                        <th>Email de Contacto</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($listaEstablecimientos as $establecimiento)
                        <tr>
                            <td>{{ $establecimiento['nombre'] }}</td>
                            <td>{{ $establecimiento['direccion_calle_principal'] }}, {{ $establecimiento['direccion_numero'] }}, {{ $establecimiento['direccion_manzana'] }}</td>
                            <td>{{ $establecimiento['telefonos_contacto'] }}</td>
                            <td>{{ $establecimiento['email_contacto'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

</body>
</html>
