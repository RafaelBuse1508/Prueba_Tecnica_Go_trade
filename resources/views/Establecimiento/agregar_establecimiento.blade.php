<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar establecimiento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container">

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

    <h1 class="mb-4">Agregar Establecimiento</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('guardar_establecimiento') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" id="nombre" name="nombre" class="form-control" value="{{ old('nombre') }}" required>
        </div>

        <div class="mb-3">
            <label for="direccion_manzana" class="form-label">Dirección Manzana:</label>
            <input type="text" id="direccion_manzana" name="direccion_manzana" class="form-control" value="{{ old('direccion_manzana') }}" required>
        </div>

        <div class="mb-3">
            <label for="direccion_calle_principal" class="form-label">Dirección Calle Principal:</label>
            <input type="text" id="direccion_calle_principal" name="direccion_calle_principal" class="form-control" value="{{ old('direccion_calle_principal') }}" required>
        </div>

        <div class="mb-3">
            <label for="direccion_numero" class="form-label">Dirección Número:</label>
            <input type="text" id="direccion_numero" name="direccion_numero" class="form-control" value="{{ old('direccion_numero') }}" required>
        </div>

        <div class="mb-3">
            <label for="direccion_transversal" class="form-label">Dirección Transversal:</label>
            <input type="text" id="direccion_transversal" name="direccion_transversal" class="form-control" value="{{ old('direccion_transversal') }}" required>
        </div>

        <div class="mb-3">
            <label for="direccion_referencia" class="form-label">Dirección Referencia:</label>
            <input type="text" id="direccion_referencia" name="direccion_referencia" class="form-control" value="{{ old('direccion_referencia') }}" required>
        </div>

        <div class="mb-3">
            <label for="administrador" class="form-label">Administrador:</label>
            <input type="text" id="administrador" name="administrador" class="form-control" value="{{ old('administrador') }}" required>
        </div>

        <div class="mb-3">
            <label for="telefonos_contacto" class="form-label">Teléfonos de Contacto:</label>
            <input type="text" id="telefonos_contacto" name="telefonos_contacto" class="form-control" value="{{ old('telefonos_contacto') }}" required>
        </div>

        <div class="mb-3">
            <label for="email_contacto" class="form-label">Email de Contacto:</label>
            <input type="email" id="email_contacto" name="email_contacto" class="form-control" value="{{ old('email_contacto') }}" required>
        </div>

        <div class="mb-3">
            <label for="ubicacion" class="form-label">Ubicación:</label>
            <input type="text" id="ubicacion" name="ubicacion" class="form-control" value="{{ old('ubicacion') }}" required>
        </div>

        <div class="mb-3">
            <label for="id_provincia" class="form-label">Provincia:</label>
            <input type="text" id="id_provincia" name="id_provincia" class="form-control" value="{{ old('id_provincia') }}" required>
        </div>

        <div class="mb-3">
            <label for="id_ciudad" class="form-label">Ciudad:</label>
            <input type="text" id="id_ciudad" name="id_ciudad" class="form-control" value="{{ old('id_ciudad') }}" required>
        </div>

        <div class="mb-3">
            <label for="id_zona" class="form-label">Zona:</label>
            <input type="text" id="id_zona" name="id_zona" class="form-control" value="{{ old('id_zona') }}" required>
        </div>

        <div class="mb-3">
            <label for="id_canal" class="form-label">Canal:</label>
            <input type="text" id="id_canal" name="id_canal" class="form-control" value="{{ old('id_canal') }}" required>
        </div>

        <div class="mb-3">
            <label for="id_subcanal" class="form-label">Subcanal:</label>
            <input type="text" id="id_subcanal" name="id_subcanal" class="form-control" value="{{ old('id_subcanal') }}" required>
        </div>

        <div class="mb-3">
            <label for="id_cadena" class="form-label">Cadena:</label>
            <input type="text" id="id_cadena" name="id_cadena" class="form-control" value="{{ old('id_cadena') }}" required>
        </div>

        <div class="mb-3">
    <label for="en_ruta" class="form-label">En Ruta:</label>
    <input type="text" id="en_ruta" name="en_ruta" class="form-control" value="{{ old('en_ruta') }}">
</div>

        <div class="mb-3">
            <label for="cliente_proyecto_id" class="form-label">Proyecto de Cliente:</label>
            <input type="text" id="cliente_proyecto_id" name="cliente_proyecto_id" class="form-control" value="{{ old('cliente_proyecto_id') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Agregar Establecimiento</button>
    </form>
</div>
</body>
</html>
