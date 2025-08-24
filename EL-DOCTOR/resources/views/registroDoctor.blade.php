<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Doctores</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/registroDoctor.css') }}">
</head>
<body>
    <div class="container">
        <div class="form-header">
            <div class="doctor-icon">
                <i class="fas fa-user-md"></i>
            </div>
            <h1>Registro de Doctor</h1>
        </div>
        
        <div class="form-container">
            <form action="{{ route('doctores.store') }}" method="POST">
                @csrf
                
                <div class="form-grid">
                    <div class="form-group">
                        <label for="nombre"><i class="fas fa-user"></i> Nombre:</label>
                        <input type="text" id="nombre" name="nombre" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="apellido"><i class="fas fa-user"></i> Apellido:</label>
                        <input type="text" id="apellido" name="apellido" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="correo"><i class="fas fa-envelope"></i> Correo:</label>
                        <input type="email" id="correo" name="correo" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="telefono"><i class="fas fa-phone"></i> Teléfono:</label>
                        <input type="text" id="telefono" name="telefono" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="especialidad"><i class="fas fa-stethoscope"></i> Especialidad:</label>
                        <select id="especialidad" name="especialidad" required>
                            <option value="" disabled selected>Seleccione una especialidad</option>
                            <option value="Medicina General">Medicina General</option>
                            <option value="Pediatría">Pediatría</option>
                            <option value="Cardiología">Cardiología</option>
                            <option value="Dermatología">Dermatología</option>
                            <option value="Neurología">Neurología</option>
                            <option value="Odontología">Odontología</option>
                            <option value="Ginecología">Ginecología</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="numero_colegiado"><i class="fas fa-id-card"></i> Número Colegiado:</label>
                        <input type="text" id="numero_colegiado" name="numero_colegiado" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="usuario"><i class="fas fa-user-circle"></i> Usuario:</label>
                        <input type="text" id="usuario" name="usuario" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="password"><i class="fas fa-lock"></i> Contraseña:</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="direccion_clinica"><i class="fas fa-hospital"></i> Dirección Clínica:</label>
                        <input type="text" id="direccion_clinica" name="direccion_clinica" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="estado"><i class="fas fa-status"></i> Estado:</label>
                        <select id="estado" name="estado" required>
                            <option value="activo">Activo</option>
                            <option value="inactivo">Inactivo</option>
                        </select>
                    </div>
                </div>
                
                <button type="submit" class="submit-btn">
                    <i class="fas fa-user-plus"></i> Registrar Doctor
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
</body>
</html>