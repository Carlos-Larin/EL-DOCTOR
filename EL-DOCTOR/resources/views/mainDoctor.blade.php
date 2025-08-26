<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Médico - Dr. {{ $doctor->nombre }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/estiloMainDoctor.css') }}">
</head>
<body>
    <header>
        <div class="container">
            <div class="header-content">
                <div class="welcome-text">
                    <h1>Bienvenido, Dr. {{ $doctor->nombre }} {{ $doctor->apellido }}</h1>
                    <p>Portal profesional de gestión médica</p>
                </div>
                <div class="doctor-icon">
                    <i class="fas fa-user-md"></i>
                </div>
            </div>
        </div>
    </header>
    
    <div class="container">
        <div class="dashboard">
            <div class="sidebar">
                <h3>Navegación</h3>
                <div class="nav-item active">
                    <i class="fas fa-home"></i>
                    <span>Inicio</span>
                </div>
                <div class="nav-item">
                    <i class="fas fa-calendar-check"></i>
                    <span>Agenda</span>
                </div>
                <div class="nav-item">
                    <i class="fas fa-users"></i>
                    <span>Pacientes</span>
                </div>
                <div class="nav-item">
                    <i class="fas fa-file-medical"></i>
                    <span>Expedientes</span>
                </div>
                <div class="nav-item">
                    <i class="fas fa-prescription"></i>
                    <span>Recetas</span>
                </div>
                <div class="nav-item">
                    <i class="fas fa-chart-line"></i>
                    <span>Estadísticas</span>
                </div>
                <div class="nav-item">
                    <a href="{{ route('doctores.edit', $doctor->id) }}" style="text-decoration: none; color: inherit; display: flex; align-items: center; gap: 10px;">
                        <i class="fas fa-cog"></i>
                        <span>Configuración</span>
                    </a>
                </div>
            </div>
            
            <div class="main-content">
                <h2 class="section-title">
                    <i class="fas fa-info-circle"></i>
                    Información del Perfil
                </h2>
                
                <div class="info-grid">
                    <div class="info-card">
                        <h4><i class="fas fa-user-md"></i> Información Profesional</h4>
                        <div class="info-item">
                            <span class="info-label">Especialidad:</span>
                            <span class="info-value">{{ $doctor->especialidad }}</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Número Colegiado:</span>
                            <span class="info-value">{{ $doctor->numero_colegiado }}</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Dirección Clínica:</span>
                            <span class="info-value">{{ $doctor->direccion_clinica }}</span>
                        </div>
                    </div>
                    
                    <div class="info-card">
                        <h4><i class="fas fa-address-card"></i> Información de Contacto</h4>
                        <div class="info-item">
                            <span class="info-label">Correo:</span>
                            <span class="info-value">{{ $doctor->correo }}</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Teléfono:</span>
                            <span class="info-value">{{ $doctor->telefono }}</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Usuario:</span>
                            <span class="info-value">{{ $doctor->usuario }}</span>
                        </div>
                    </div>
                    
                    <div class="info-card">
                        <h4><i class="fas fa-info-circle"></i> Información Adicional</h4>
                        <div class="info-item">
                            <span class="info-label">Estado:</span>
                            <span class="info-value">
                                <span class="status status-active">{{ $doctor->estado }}</span>
                            </span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Fecha de Creación:</span>
                            <span class="info-value">{{ $doctor->fecha_creacion }}</span>
                        </div>
                    </div>
                </div>
                
                <h2 class="section-title" style="margin-top: 40px;">
                    <i class="fas fa-bolt"></i>
                    Acciones Rápidas
                </h2>
                
                <div class="quick-actions">
                    <div class="action-btn">
                        <i class="fas fa-calendar-plus"></i>
                        <span>Nueva Cita</span>
                    </div>
                    <div class="action-btn">
                        <i class="fas fa-user-plus"></i>
                        <span>Nuevo Paciente</span>
                    </div>
                    <div class="action-btn">
                        <i class="fas fa-file-prescription"></i>
                        <span>Emitir Receta</span>
                    </div>
                    <div class="action-btn">
                        <i class="fas fa-chart-bar"></i>
                        <span>Ver Reportes</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <footer>
        <div class="container">
            <p>© 2023 Sistema Médico - Todos los derechos reservados</p>
        </div>
    </footer>
</body>
</html>