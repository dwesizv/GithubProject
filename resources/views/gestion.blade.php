@extends('template.base')

@section('content')
    <div class="container">
        <h1>Gestión de alumnos y módulos</h1>
        <a href="{{ route('matricula.create') }}" class="btn btn-secondary mb-3">Matricular</a>
        <a href="{{ route('alumno.create') }}" class="btn btn-secondary mb-3">Crear Alumno</a>
        <a href="{{ route('modulo.create') }}" class="btn btn-secondary mb-3">Crear Módulo</a>
        <a href="{{ route('alumno.index') }}" class="btn btn-secondary mb-3">Ver Alumnos</a>
        <a href="{{ route('modulo.index') }}" class="btn btn-secondary mb-3">Ver Módulos</a>
        <hr>
    </div>
@endsection