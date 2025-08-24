<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/estiloLogin.css') }}">
    <script>
        function mostrarRegistro() {
            document.getElementById('opciones').style.display = 'none';
            document.getElementById('registroTipo').style.display = 'block';
        }
        function redirigirRegistro(tipo) {
            if (tipo === 'doctor') {
                window.location.href = "{{ route('registroDoctor') }}";
            } else if (tipo === 'paciente') {
                window.location.href = "{{ route('registroPaciente') }}";
            }
        }
        function mostrarLogin() {
            document.getElementById('opciones').style.display = 'none';
            document.getElementById('loginForm').style.display = 'block';
        }
    </script>
</head>
<body>
    <div class="body">
        <div class="login-container">
            <h1>Bienvenido</h1>
            <div id="opciones">
                <p>¿Ya tienes una cuenta?</p>
                <button onclick="mostrarLogin()">Sí, ingresar</button>
                <button onclick="mostrarRegistro()">No, necesito una cuenta</button>
            </div>
            <div id="registroTipo" style="display:none;">
                <p>¿Eres doctor o paciente?</p>
                <button onclick="redirigirRegistro('doctor')">Doctor</button>
                <button onclick="redirigirRegistro('paciente')">Paciente</button>
            </div>
            <div id="loginForm" style="display:none;">
                <h2>Inicio de sesión</h2>
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="input-group">
                        <input type="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="input-group">
                        <input type="password" name="password" placeholder="Contraseña" required>
                    </div>
                    <button type="submit">Iniciar</button>
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
    </div>
</body>
</html>
