
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Doctores por Especialidad</title>
    <link rel="stylesheet" href="{{ asset('css/listaDoctores.css') }}">
</head>
<body>
    <h1>Lista de Doctores por Especialidad</h1>

    @php
        $especialidades = $doctores->groupBy('especialidad');
    @endphp

    @foreach($especialidades as $especialidad => $docs)
        <h2>{{ $especialidad }}</h2>
        <table border="1" cellpadding="5">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Especialidad</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>Dirección Clínica</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach($docs as $doctor)
                    <tr>
                        <td>{{ $doctor->nombre }}</td>
                        <td>{{ $doctor->apellido }}</td>
                        <td>{{ $doctor->especialidad }}</td>
                        <td>{{ $doctor->correo }}</td>
                        <td>{{ $doctor->telefono }}</td>
                        <td>{{ $doctor->direccion_clinica }}</td>
                        <td>{{ $doctor->estado }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>
    @endforeach

</body>
</html>