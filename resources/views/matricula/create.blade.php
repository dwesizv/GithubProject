@extends('template.base')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-6 mx-auto">
            <h2>Curso escolar: {{ $curso_escolar ?? 'sin definir' }}</h2>
            <form action="{{ route('matricula.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="alumno_id" class="form-label">Alumno que se matricula</label>
                    <select name="alumno_id" id="alumno_id" class="form-select" required>
                        <option value="" selected disabled>Selecciona un alumno ...</option>
                        @foreach($alumnos as $alumno)
                            <option value="{{ $alumno->id }}">{{ $alumno->apellidos }}, {{ $alumno->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="modulo_id" class="form-label">Módulo en el que se matricula</label>
                    <select name="modulo_id" id="modulo_id" class="form-select" required>
                        <option value="" selected disabled>Selecciona un modulo ...</option>
                        @foreach($modulos as $index => $modulo)
                            <option value="{{ $index }}">{{ $modulo }}</option>
                        @endforeach
                    </select>
                </div>
                <button class="btn btn-secondary" type="submit">Matricular</button>
            </form>
        </div>
    </div>
</div>
@endsection