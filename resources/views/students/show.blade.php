@extends('students.layouts')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Información del estudiante
                </div>
                <div class="float-end">
                    <a href="{{ route('students.index') }}" class="btn btn-primary btn-sm">&larr; Atrás</a>
                </div>
            </div>
            <div class="card-body">

                    <div class="row">
                        <label for="dni" class="col-md-4 col-form-label text-md-end text-start"><strong>DNI:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $student->dni }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="nombre" class="col-md-4 col-form-label text-md-end text-start"><strong>Nombre:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $student->nombre }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="apellido" class="col-md-4 col-form-label text-md-end text-start"><strong>Apellido:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $student->apellido }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="fechaNacimiento" class="col-md-4 col-form-label text-md-end text-start"><strong>Fecha de Nacimiento:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $student->fechaNacimiento }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="grupo" class="col-md-4 col-form-label text-md-end text-start"><strong>Grupo:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $student->grupo }}
                        </div>
                    </div>
        
            </div>
        </div>
    </div>    
</div>
    
@endsection