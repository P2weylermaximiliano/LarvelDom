@extends('students.layouts')
<x-app-layout>
@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-12">

        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif
        

        <div class="card">
            <div class="card-header">Lista de estudiantes</div>

            <form id="yearForm" action="{{ route('filtrardato') }}" method="POST">
             @csrf
            <div class="form-group">
            <select class="form-control" id="year" name="year" onchange="document.getElementById('yearForm').submit();">
            <option value="" disabled selected>Seleccionar Año</option>
            <option value="1">Año 1</option>
            <option value="2">Año 2</option>
            <option value="3">Año 3</option>
            <option value="todos">todos</option>
            </select>
            </div>
            </form>
            <div class="card-body">

                <a href="{{ route('students.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Agregar un nuevo estudiante</a>
                <a href="{{ route('PDF') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> PDF</a>
                <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">Nº</th>
                        <th scope="col">DNI</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Fecha de Nacimiento</th>
                        <th scope="col">Grupo</th>
                        <th scope="col">Año</th>
                        <th scope="col">Asistencias</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($students as $student)
                        @if (Carbon\Carbon::parse($student->fechaNacimiento)->isBirthday())
                        <p class="text-success">¡Feliz cumpleaños, {{ $student->nombre }}!</p>
                        @endif
                        
                        <tr>
                            <th scope="row">{{ $student->id }}</th>
                            <td>{{ $student->dni }}</td>
                            <td>{{ $student->nombre }}</td>
                            <td>{{ $student->apellido }}</td>
                            <td>{{ Carbon\Carbon::parse($student->fechaNacimiento)->format('d-m-Y') }}</td>
                            <td>{{ $student->grupo }}</td>
                            <td>{{ $student->año }}</td>
                            <td>{{ $student->assists->count() }}</td>
                            <td>
                                <form action="{{ route('students.destroy', $student->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <a href="{{ route('students.show', $student->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Vista</a>

                                    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Editar</a>   

                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Quieres eliminar a este estudiante?');"><i class="bi bi-trash"></i> Eliminar</button>

                                    <a href="{{ route('assist', ['id' => $student->id]) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Asistencias</a>

                                    


                                </form>
                                
                            </td>
                        </tr>
                        @empty
                            <td colspan="6">
                                <span class="text-danger">
                                    <strong>¡No se encontró ningún estudiante!</strong>
                                </span>
                            </td>
                            
                        @endforelse
                    </tbody>
                  </table>
                  
                  
            </div>
        </div>
        <a href="{{ route('logueo') }}" class="btn btn-primary btn-sm"><i class="bi bi-border-width"></i> Logueos</a>
    </div>    
</div>

</x-app-layout>


    
@endsection
