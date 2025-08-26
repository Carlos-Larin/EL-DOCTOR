<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal del Paciente - Vista General</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/estiloMainPaciente.css') }}">
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <div class="welcome-section">
                <h1>¡Bienvenido/a, {{ $paciente->nombre }} {{ $paciente->apellido }}!</h1>
                <p>Gestiona tu salud de manera integral</p>
            </div>
            <div class="user-info">
                <div class="user-avatar">
                    <i class="fas fa-user"></i>
                </div>
                <a href="{{ route('logout') }}" class="logout-btn">
                    <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
                </a>
            </div>
        </div>

        <!-- Dashboard -->
        <div class="dashboard">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-calendar-check"></i>
                    <h2>Mis Citas</h2>
                </div>
                <p>Gestiona y agenda tus citas médicas</p>
                <a href="{{ route('citas.index') }}" class="appointment-btn">
                    <i class="fas fa-calendar-plus"></i> Agendar Cita
                </a>
            </div>

            <div class="card">
                <div class="card-header">
                    <i class="fas fa-file-medical"></i>
                    <h2>Historial Médico</h2>
                </div>
                <p>Consulta tu historial médico completo</p>
                <a href="{{ route('historial.index') }}" class="appointment-btn">
                    <i class="fas fa-history"></i> Ver Historial
                </a>
            </div>

            <div class="card">
                <div class="card-header">
                    <i class="fas fa-user-md"></i>
                    <h2>Mis Doctores</h2>
                </div>
                <p>Doctores que te están atendiendo</p>
                <a href="{{ route('doctores.index') }}" class="appointment-btn">
                    <i class="fas fa-search"></i> Buscar Doctores
                </a>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="quick-actions">
            <h2><i class="fas fa-bolt"></i> Acciones Rápidas</h2>
            <div class="action-buttons">
                <a href="{{ route('perfil.edit') }}" class="action-btn">
                    <i class="fas fa-user-edit"></i> Editar Perfil
                </a>
                <a href="{{ route('recetas.index') }}" class="action-btn">
                    <i class="fas fa-prescription"></i> Mis Recetas
                </a>
                <a href="{{ route('examenes.index') }}" class="action-btn">
                    <i class="fas fa-microscope"></i> Resultados Exámenes
                </a>
                <a href="{{ route('emergencia') }}" class="action-btn emergency">
                    <i class="fas fa-ambulance"></i> Emergencia
                </a>
            </div>
        </div>
    </div>

    <script>
        // Efectos de hover suaves
        document.querySelectorAll('.card, .action-btn').forEach(item => {
            item.addEventListener('mouseenter', () => {
                item.style.transform = 'translateY(-2px)';
            });
            item.addEventListener('mouseleave', () => {
                item.style.transform = 'translateY(0)';
            });
        });
    </script>
</body>
</html>