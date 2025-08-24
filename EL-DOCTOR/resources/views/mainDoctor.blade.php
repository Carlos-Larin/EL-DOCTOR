<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil del Doctor</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&family=Playfair+Display:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="">
    <style>
        :root {
            --primary-color: #1a73e8;
            --primary-light: #e8f0fe;
            --secondary-color: #4caf50;
            --text-color: #202124;
            --text-light: #5f6368;
            --background: #f8f9fa;
            --white: #ffffff;
            --border-color: #dadce0;
            --shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Roboto', sans-serif;
            background-color: var(--background);
            color: var(--text-color);
            line-height: 1.6;
            padding: 20px;
        }
        
        .container {
            max-width: 1000px;
            margin: 0 auto;
            background: var(--white);
            border-radius: 12px;
            box-shadow: var(--shadow);
            overflow: hidden;
        }
        
        .header {
            background: linear-gradient(135deg, var(--primary-color), #0d47a1);
            color: white;
            padding: 30px;
            text-align: center;
            position: relative;
        }
        
        .header h1 {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            font-size: 2.5rem;
            margin-bottom: 10px;
        }
        
        .header::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, var(--secondary-color), transparent);
        }
        
        .profile-content {
            padding: 30px;
        }
        
        .profile-info {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .info-card {
            background: var(--white);
            border-radius: 8px;
            padding: 20px;
            box-shadow: var(--shadow);
            border-left: 4px solid var(--primary-color);
        }
        
        .info-card h3 {
            color: var(--primary-color);
            margin-bottom: 15px;
            font-size: 1.2rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .info-card ul {
            list-style: none;
        }
        
        .info-card li {
            padding: 10px 0;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            justify-content: space-between;
        }
        
        .info-card li:last-child {
            border-bottom: none;
        }
        
        .info-card strong {
            color: var(--text-color);
            min-width: 160px;
            display: inline-block;
        }
        
        .status {
            display: inline-block;
            padding: 4px 12px;
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
        
        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 30px;
        }
        
        .btn {
            padding: 12px 24px;
            border-radius: 6px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            color: white;
        }
        
        .btn-primary:hover {
            background-color: #0d47a1;
            transform: translateY(-2px);
        }
        
        .btn-outline {
            background-color: transparent;
            border: 1px solid var(--primary-color);
            color: var(--primary-color);
        }
        
        .btn-outline:hover {
            background-color: var(--primary-light);
        }
        
        @media (max-width: 768px) {
            .profile-info {
                grid-template-columns: 1fr;
            }
            
            .header h1 {
                font-size: 2rem;
            }
            
            .action-buttons {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Bienvenido, Dr. {{ $doctor->nombre }} {{ $doctor->apellido }}</h1>
            <p>Panel de información profesional</p>
        </div>
        
        <div class="profile-content">
            <div class="profile-info">
                <div class="info-card">
                    <h3><i class="fas fa-user-md"></i> Información Profesional</h3>
                    <ul>
                        <li><strong>Especialidad:</strong> {{ $doctor->especialidad }}</li>
                        <li><strong>Número Colegiado:</strong> {{ $doctor->numero_colegiado }}</li>
                        <li><strong>Dirección Clínica:</strong> {{ $doctor->direccion_clinica }}</li>
                    </ul>
                </div>
                
                <div class="info-card">
                    <h3><i class="fas fa-address-card"></i> Información de Contacto</h3>
                    <ul>
                        <li><strong>Correo:</strong> {{ $doctor->correo }}</li>
                        <li><strong>Teléfono:</strong> {{ $doctor->telefono }}</li>
                        <li><strong>Usuario:</strong> {{ $doctor->usuario }}</li>
                    </ul>
                </div>
                
                <div class="info-card">
                    <h3><i class="fas fa-info-circle"></i> Información Adicional</h3>
                    <ul>
                        <li><strong>Estado:</strong> 
                            <span class="status {{ $doctor->estado == 'activo' ? 'status-active' : 'status-inactive' }}">
                                {{ $doctor->estado }}
                            </span>
                        </li>
                        <li><strong>Fecha de Creación:</strong> {{ $doctor->fecha_creacion }}</li>
                    </ul>
                </div>
            </div>
            
            <div class="action-buttons">
                <button class="btn btn-primary"><i class="fas fa-calendar-check"></i> Ver Agenda</button>
                <button class="btn btn-outline"><i class="fas fa-user-edit"></i> Editar Perfil</button>
                <button class="btn btn-outline"><i class="fas fa-file-medical"></i> Historial Médico</button>
                <button class="btn btn-outline"><i class="fas fa-calendar-check"></i> Nueva Cita</button>
                <button class="btn btn-outline"><i class="fas fa-user-edit"></i> Nuevo Paciente</button>
                <button class="btn btn-outline"><i class="fas fa-file-medical"></i> Emitir Receta</button>
            </div>
        </div>
    </div>
</body>
</html>