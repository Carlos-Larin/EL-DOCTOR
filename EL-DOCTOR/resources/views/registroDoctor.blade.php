<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Doctores</title>
</head>
<body>
    <h1>Registro de Doctor</h1>
    <form action="{{ route('doctores.store') }}" method="POST">
        @csrf
        <label>Nombre:</label>
        <input type="text" name="nombre" required><br>

        <label>Apellido:</label>
        <input type="text" name="apellido" required><br>

        <label>Correo:</label>
        <input type="email" name="correo" required><br>

        <label>Teléfono:</label>
        <input type="text" name="telefono" required><br>

        <label>Especialidad:</label>
        <select id="especialidad" name="especialidad" required>
            <option value="" disabled selected>Seleccione una especialidad</option>
            <option value="Medicina General">Medicina General</option>
            <option value="Pediatría">Pediatría</option>
            <option value="Cardiología">Cardiología</option>
            <option value="Dermatología">Dermatología</option>
            <option value="Neurología">Neurología</option>
            <option value="Odontología">Odontología</option>
            <option value="Ginecología">Ginecología</option>
        </select><br>

        <label>Número Colegiado:</label>
        <input type="text" name="numero_colegiado" required><br>

        <label>Usuario:</label>
        <input type="text" name="usuario" required><br>

        <label>Contraseña:</label>
        <input type="password" name="password" required><br>

        <label>Dirección Clínica:</label>
        <input type="text" name="direccion_clinica" required><br>

        <label>Estado:</label>
        <select name="estado" required>
            <option value="activo">Activo</option>
            <option value="inactivo">Inactivo</option>
        </select><br>

        <button type="submit">Registrar</button>
    </form>
</body>
</html>