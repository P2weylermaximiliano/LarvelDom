@extends('students.layouts')

@section('content')
    <h1>Detalles del Estudiante</h1>
    @if($estudiante)
        <p>ID: {{ $estudiante->id }}</p>
        <p>DNI: {{ $estudiante->dni }}</p>
        <p>Nombre: {{ $estudiante->nombre }}</p>
        <p>Apellido: {{ $estudiante->apellido }}</p>
        <p>Fecha de Nacimiento: {{ $estudiante->fecha_nacimiento }}</p>
        <p>Grupo: {{ $estudiante->grupo }}</p>
        <a href="{{ route('PonerAssist', ['id' => $estudiante->id]) }}" class="btn btn-primary btn-sm"><i class="bi bi-arrow-up"></i> Poner Asistencias</a>
    @else
        <p>No se encontró ningún estudiante con el DNI proporcionado.</p>
    @endif
@endsection
