<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <link rel="stylesheet" href="{{ asset('css/estiloLogin.css') }}">
    <div class="body">
        <div class="login-container">
            <h1>Inicio de sesión</h1>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="input-group">
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                <div class="input-group">
                    <input type="password" name="password" placeholder="Contraseña" required>
                </div>
                <button type="submit">Iniciar</button>
                <a href="{{ route('register') }}"><button type="button">Registrarse</button></a>
            </form>
            @if ($errors->any())
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('success'))
                <div>
                    {{ session('success') }}
                </div>
            @endif
        </div>
    </div>
</body>
</html>