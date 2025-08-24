<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Médico - Dr. {{ $doctor->nombre }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #1a73e8;
            --primary-light: #e8f0fe;
            --secondary: #4caf50;
            --dark: #202124;
            --light: #f8f9fa;
            --gray: #5f6368;
            --white: #ffffff;
            --border: #dadce0;
            --shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: var(--light);
            color: var(--dark);
            line-height: 1.6;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        header {
            background: linear-gradient(135deg, var(--primary), #0d47a1);
            color: white;
            padding: 25px 0;
            border-bottom: 4px solid var(--secondary);
        }
        
        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .welcome-text h1 {
            font-weight: 600;
            font-size: 2.2rem;
            margin-bottom: 5px;
        }
        
        .welcome-text p {
            font-size: 1.1rem;
            opacity: 0.9;
        }
        
        .doctor-icon {
            background-color: var(--white);
            width: 80px;
            height: 80px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: var(--shadow);
        }
        
        .doctor-icon i {
            font-size: 2.5rem;
            color: var(--primary);
        }
        
        .dashboard {
            display: grid;
            grid-template-columns: 1fr 3fr;
            gap: 25px;
            margin-top: 30px;
        }
        
        .sidebar {
            background-color: var(--white);
            border-radius: 12px;
            box-shadow: var(--shadow);
            padding: 25px;
            height: fit-content;
        }
        
        .sidebar h3 {
            color: var(--primary);
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--primary-light);
        }
        
        .nav-item {
            display: flex;
            align-items: center;
            padding: 12px 15px;
            margin-bottom: 8px;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s;
            color: var(--gray);
        }
        
        .nav-item:hover {
            background-color: var(--primary-light);
            color: var(--primary);
        }
        
        .nav-item.active {
            background-color: var(--primary);
            color: var(--white);
        }
        
        .nav-item i {
            margin-right: 12px;
            font-size: 1.2rem;
        }
        
        .main-content {
            background-color: var(--white);
            border-radius: 12px;
            box-shadow: var(--shadow);
            padding: 30px;
        }
        
        .section-title {
            color: var(--primary);
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 2px solid var(--primary-light);
            display: flex;
            align-items: center;
        }
        
        .section-title i {
            margin-right: 10px;
        }
        
        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
        }
        
        .info-card {
            padding: 20px;
            border-radius: 10px;
            background-color: var(--light);
            border-left: 4px solid var(--primary);
        }
        
        .info-card h4 {
            color: var(--primary);
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }
        
        .info-card h4 i {
            margin-right: 10px;
        }
        
        .info-item {
            margin-bottom: 12px;
            display: flex;
            justify-content: space-between;
            padding-bottom: 12px;
            border-bottom: 1px solid var(--border);
        }
        
        .info-item:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }
        
        .info-label {
            font-weight: 600;
            color: var(--dark);
            min-width: 160px;
        }
        
        .info-value {
            color: var(--gray);
            text-align: right;
        }
        
        .status {
            display: inline-block;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
        }
        
        .status-active {
            background-color: #e6f4ea;
            color: #137333;
        }
        
        .status-inactive {
            background-color: #fce8e6;
            color: #c5221f;
        }
        
        .quick-actions {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 40px;
        }
        
        .action-btn {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 25px 15px;
            background-color: var(--primary-light);
            border-radius: 10px;
            text-align: center;
            transition: all 0.3s;
            cursor: pointer;
        }
        
        .action-btn:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow);
            background-color: var(--primary);
            color: var(--white);
        }
        
        .action-btn i {
            font-size: 2.2rem;
            margin-bottom: 15px;
            color: var(--primary);
        }
        
        .action-btn:hover i {
            color: var(--white);
        }
        
        .action-btn span {
            font-weight: 600;
        }
        
        footer {
            text-align: center;
            margin-top: 40px;
            padding: 20px;
            color: var(--gray);
            font-size: 0.9rem;
        }
        
        @media (max-width: 900px) {
            .dashboard {
                grid-template-columns: 1fr;
            }
            
            .sidebar {
                order: 2;
            }
            
            .main-content {
                order: 1;
            }
        }
        
        @media (max-width: 600px) {
            .header-content {
                flex-direction: column;
                text-align: center;
            }
            
            .doctor-icon {
                margin-top: 15px;
            }
            
            .info-grid {
                grid-template-columns: 1fr;
            }
            
            .quick-actions {
                grid-template-columns: 1fr 1fr;
            }
        }
    </style>
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
                    <i class="fas fa-cog"></i>
                    <span>Configuración</span>
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