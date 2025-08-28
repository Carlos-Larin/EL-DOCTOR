<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil - Dr. {{ $doctor->nombre }} {{ $doctor->apellido }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 800px;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h1 {
            color: #333;
            margin-bottom: 10px;
        }

        .header p {
            color: #666;
        }

        .doctor-icon {
            font-size: 48px;
            color: #667eea;
            margin-bottom: 15px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: 600;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border-color: #667eea;
            outline: none;
        }

        .btn-group {
            display: flex;
            gap: 15px;
            justify-content: center;
            margin-top: 20px;
        }

        .btn {
            padding: 12px 25px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            transition: all 0.3s;
        }

        .btn-primary {
            background: #667eea;
            color: white;
        }

        .btn-primary:hover {
            background: #5a67d8;
        }

        .btn-secondary {
            background: #94a3b8;
            color: white;
        }

        .btn-secondary:hover {
            background: #64748b;
        }

        .btn-danger {
            background: #ef4444;
            color: white;
        }

        .btn-danger:hover {
            background: #dc2626;
        }

        .error-message {
            color: #ef4444;
            font-size: 14px;
            margin-top: 5px;
        }

        .success-message {
            background: #10b981;
            color: white;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
        }

        @media (max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr;
            }
            
            .btn-group {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="doctor-icon">
                <i class="fas fa-user-md"></i>
            </div>
            <h1>Editar Perfil Médico</h1>
            <p>Actualiza tu información personal y profesional</p>
        </div>

        <!-- Mostrar mensajes de éxito -->
        @if(session('success'))
            <div class="success-message">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        <!-- Mostrar errores de validación -->
        @if($errors->any())
            <div class="error-message" style="background: #fee2e2; color: #ef4444; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
                <strong><i class="fas fa-exclamation-triangle"></i> Errores encontrados:</strong>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('doctores.update', $doctor->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-grid">
                <div class="form-group">
                    <label for="nombre"><i class="fas fa-user"></i> Nombre:</label>
                    <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $doctor->nombre) }}" required>
                </div>

                <div class="form-group">
                    <label for="apellido"><i class="fas fa-user"></i> Apellido:</label>
                    <input type="text" id="apellido" name="apellido" value="{{ old('apellido', $doctor->apellido) }}" required>
                </div>

                <div class="form-group">
                    <label for="correo"><i class="fas fa-envelope"></i> Correo:</label>
                    <input type="email" id="correo" name="correo" value="{{ old('correo', $doctor->correo) }}" required>
                </div>

                <div class="form-group">
                    <label for="telefono"><i class="fas fa-phone"></i> Teléfono:</label>
                    <input type="text" id="telefono" name="telefono" value="{{ old('telefono', $doctor->telefono) }}" required>
                </div>

                <div class="form-group">
                    <label for="especialidad"><i class="fas fa-stethoscope"></i> Especialidad:</label>
                    <input type="text" id="especialidad" name="especialidad" value="{{ old('especialidad', $doctor->especialidad) }}" required>
                </div>

                <div class="form-group">
                    <label for="numero_colegiado"><i class="fas fa-id-card"></i> Número de Colegiado:</label>
                    <input type="text" id="numero_colegiado" name="numero_colegiado" value="{{ old('numero_colegiado', $doctor->numero_colegiado) }}" required>
                </div>

                <div class="form-group">
                    <label for="usuario"><i class="fas fa-user-circle"></i> Usuario:</label>
                    <input type="text" id="usuario" name="usuario" value="{{ old('usuario', $doctor->usuario) }}" required>
                </div>

                <div class="form-group">
                    <label for="direccion_clinica"><i class="fas fa-hospital"></i> Dirección de la Clínica:</label>
                    <textarea id="direccion_clinica" name="direccion_clinica" rows="3" required>{{ old('direccion_clinica', $doctor->direccion_clinica) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="estado"><i class="fas fa-status"></i> Estado:</label>
                    <select id="estado" name="estado" required>
                        <option value="Activo" {{ old('estado', $doctor->estado) == 'Activo' ? 'selected' : '' }}>Activo</option>
                        <option value="Inactivo" {{ old('estado', $doctor->estado) == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                        <option value="Vacaciones" {{ old('estado', $doctor->estado) == 'Vacaciones' ? 'selected' : '' }}>Vacaciones</option>
                    </select>
                </div>
            </div>

            <div class="btn-group">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Actualizar Perfil
                </button>
                
                <a href="{{ route('doctores.show', $doctor->id) }}" class="btn btn-secondary">
                    <i class="fas fa-times"></i> Cancelar
                </a>

                <a href="{{ route('doctores.index') }}" class="btn btn-secondary">
                    <i class="fas fa-list"></i> Volver a la Lista
                </a>
            </div>
        </form>

        <!-- Formulario para eliminar -->
        <div style="margin-top: 30px; padding-top: 20px; border-top: 2px solid #eee;">
            <h3 style="color: #ef4444; margin-bottom: 15px;">Zona de peligro</h3>
            <form action="{{ route('doctores.destroy', $doctor->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que quieres eliminar tu perfil? Esta acción no se puede deshacer.')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    <i class="fas fa-trash"></i> Eliminar Perfil
                </button>
            </form>
        </div>
    </div>

    <script>
        // Auto-ocultar mensajes después de 5 segundos
        setTimeout(function() {
            const successMessage = document.querySelector('.success-message');
            if (successMessage) {
                successMessage.style.display = 'none';
            }
        }, 5000);
    </script>
</body>
</html>