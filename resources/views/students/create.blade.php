@extends('students.layouts')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Agregar un nuevo estudiante
                </div>
                <div class="float-end">
                    <a href="{{ route('students.index') }}" class="btn btn-primary btn-sm">&larr; Atrás</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('students.store') }}" method="post">
                    @csrf

                    <div class="mb-3 row">
                        <label for="dni" class="col-md-4 col-form-label text-md-end text-start">DNI</label>
                        <div class="col-md-6">
                          <input type="number" class="form-control @error('dni') is-invalid @enderror" id="dni" name="dni" value="{{ old('dni') }}">
                            @if ($errors->has('dni'))
                                <span class="text-danger">{{ $errors->first('dni') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="nombre" class="col-md-4 col-form-label text-md-end text-start">Nombre</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ old('nombre') }}">
                            @if ($errors->has('nombre'))
                                <span class="text-danger">{{ $errors->first('nombre') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="apellido" class="col-md-4 col-form-label text-md-end text-start">Apellido</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('apellido') is-invalid @enderror" id="apellido" name="apellido" value="{{ old('apellido') }}">
                            @if ($errors->has('apellido'))
                                <span class="text-danger">{{ $errors->first('apellido') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="fechaNacimiento" class="col-md-4 col-form-label text-md-end text-start">Fecha Nacimiento</label>
                        <div class="col-md-6">
                          <input type="date" step="0.01" class="form-control @error('fechaNacimiento') is-invalid @enderror" id="fechaNacimiento" name="fechaNacimiento" value="{{ old('fechaNacimiento') }}">
                            @if ($errors->has('fechaNacimiento'))
                                <span class="text-danger">{{ $errors->first('fechaNacimiento') }}</span>
                            @endif
                        
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="grupo" class="col-md-4 col-form-label text-md-end text-start">Grupo</label>
                        <div class="col-md-6">
                          <input type="text" step="0.01" class="form-control @error('grupo') is-invalid @enderror" id="grupo" name="grupo" value="{{ old('grupo') }}">
                            @if ($errors->has('grupo'))
                                <span class="text-danger">{{ $errors->first('grupo') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="año" class="col-md-4 col-form-label text-md-end text-start">Año</label>
                        <div class="col-md-6">
                          <input type="text" step="0.01" class="form-control @error('año') is-invalid @enderror" id="año" name="año" value="{{ old('año') }}">
                            @if ($errors->has('año'))
                                <span class="text-danger">{{ $errors->first('año') }}</span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Agregar estudiante">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>    
</div>
    
@endsection