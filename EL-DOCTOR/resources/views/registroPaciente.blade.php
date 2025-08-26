<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Pacientes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/registroPaciente.css') }}">
</head>
<body>
    <div class="container">
        <div class="form-header">
            <div class="patient-icon">
                <i class="fas fa-user-injured"></i>
            </div>
            <h1>Registro de Paciente</h1>
        </div>
        
        <div class="form-container">
            <!-- Mensaje de éxito -->
            <div id="successMessage" class="success-message" style="display: none;">
                <i class="fas fa-check-circle"></i>
                <span id="successText"></span>
            </div>
            
            <form id="registroForm" action="{{ route('paciente.store') }}" method="POST">
                @csrf
                
                <div class="form-grid">
                    <div class="form-group">
                        <label for="nombre"><i class="fas fa-user"></i> Nombre:</label>
                        <input type="text" id="nombre" name="nombre" required>
                        <div class="error-message" id="nombreError"></div>
                    </div>
                    
                    <div class="form-group">
                        <label for="apellido"><i class="fas fa-user"></i> Apellido:</label>
                        <input type="text" id="apellido" name="apellido" required>
                        <div class="error-message" id="apellidoError"></div>
                    </div>
                    
                    <div class="form-group">
                        <label for="fecha_nacimiento"><i class="fas fa-birthday-cake"></i> Fecha de Nacimiento:</label>
                        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required>
                        <div class="error-message" id="fechaError"></div>
                    </div>
                    
                    <div class="form-group">
                        <label for="sexo"><i class="fas fa-venus-mars"></i> Sexo:</label>
                        <select id="sexo" name="sexo" required>
                            <option value="" disabled selected>Seleccione su sexo</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                            <option value="Otro">Otro</option>
                        </select>
                        <div class="error-message" id="sexoError"></div>
                    </div>
                    
                    <div class="form-group">
                        <label for="correo"><i class="fas fa-envelope"></i> Correo:</label>
                        <input type="email" id="correo" name="correo" required>
                        <div class="error-message" id="correoError"></div>
                    </div>
                    
                    <div class="form-group">
                        <label for="telefono"><i class="fas fa-phone"></i> Teléfono:</label>
                        <input type="text" id="telefono" name="telefono" required>
                        <div class="error-message" id="telefonoError"></div>
                    </div>
                    
                    <div class="form-group">
                        <label for="direccion"><i class="fas fa-home"></i> Dirección:</label>
                        <input type="text" id="direccion" name="direccion" required>
                        <div class="error-message" id="direccionError"></div>
                    </div>
                    
                    <div class="form-group">
                        <label for="usuario"><i class="fas fa-user-circle"></i> Usuario:</label>
                        <input type="text" id="usuario" name="usuario" required>
                        <div class="error-message" id="usuarioError"></div>
                    </div>
                    
                    <div class="form-group">
                        <label for="password"><i class="fas fa-lock"></i> Contraseña:</label>
                        <input type="password" id="password" name="password" required>
                        <div class="error-message" id="passwordError"></div>
                    </div>
                    
                    <div class="form-group">
                        <label for="password_confirmation"><i class="fas fa-lock"></i> Confirmar Contraseña:</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required>
                        <div class="error-message" id="passwordConfirmationError"></div>
                    </div>
                </div>
                
                <button type="submit" class="submit-btn">
                    <i class="fas fa-user-plus"></i> Registrar Paciente
                </button>
            </form>
            
            <div class="form-footer">
                <p>¿Ya tienes una cuenta?</p>
                <a href="{{ route('login') }}" class="login-btn">
                    <i class="fas fa-sign-in-alt"></i> Iniciar Sesión
                </a>
                <a href="{{ url('/') }}" class="home-btn">
                    <i class="fas fa-home"></i> Volver al Inicio
                </a>
            </div>
        </div>
    </div>

    <script>
        //<!-- Mostrar errores de validación -->
        @if($errors->any())
            <div class="error-message" style="display: block; background: #ffebee; color: #c62828; padding: 10px; margin-bottom: 20px; border-radius: 5px;">
                <i class="fas fa-exclamation-triangle"></i>
                <strong>Errores encontrados:</strong>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        //<!-- Mostrar otros errores -->
        @if(session('error'))
            <div class="error-message" style="display: block; background: #ffebee; color: #c62828; padding: 10px; margin-bottom: 20px; border-radius: 5px;">
                <i class="fas fa-exclamation-triangle"></i>
                {{ session('error') }}
            </div>
        @endif
    </script>
</body>
</html>