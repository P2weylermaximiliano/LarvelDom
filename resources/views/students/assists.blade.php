
<h1>Información del Estudiante</h1>
<p>Nombre del Estudiante: {{ $student->nombre }}</p>

<h2>Asistencias</h2>
<ul>
    @foreach ($cant as $assist)
        <li>{{ $assist->created_at }}</li>
        
    @endforeach
</ul>

</body>
</html>
