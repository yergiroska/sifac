<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 2rem; }
        form { max-width: 400px; margin: auto; }
        .form-group { margin-bottom: 1rem; }
        .form-group label { display: block; margin-bottom: 0.5rem; }
        .form-group input { width: 100%; padding: 0.5rem; }
        .form-group button { padding: 0.5rem 1rem; background: blue; color: white; border: none; cursor: pointer; }
        .form-group button:hover { background: darkblue; }
        .title {
            font-family: Arial, sans-serif;
            color: #4CAF50;
            font-size: 2rem;
            text-align: center;
            margin-top: 20px;
        }
</style>
</head>
<body>
    <h1 class="title">Registro de Usuario</h1>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

    @if($errors->any())
        <div style="color: red;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<form action="{{ route('register.submit') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" required>
    </div>
    <div class="form-group">
        <label for="email">Correo Electrónico:</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required>
    </div>
    <div class="form-group">
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
    </div>
    <div class="form-group">
        <label for="password_confirmation">Confirmar Contraseña:</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required>
    </div>
    <div class="form-group">
        <button type="submit">Registrar</button>
    </div>
</form>
</body>
</html>
