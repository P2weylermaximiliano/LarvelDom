<!DOCTYPE html>
<html>
<head>
    <title>Lista de Alumnos</title>
</head>
<body>
    <h1>Lista de Alumnos</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>DNI</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Fecha de Nacimiento</th>
                <th>Grupo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->dni }}</td>
                    <td>{{ $student->nombre }}</td>
                    <td>{{ $student->apellido }}</td>
                    <td>{{ $student->fecha_nacimiento }}</td>
                    <td>{{ $student->año }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>