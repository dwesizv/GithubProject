@extends('template.base')

@section('content')
<h1>Matricular</h1>
<h1>{{ $alumno->nombre }}  {{ $alumno->apellidos }}</h1>
<hr>
<!-- pilar -->
 <div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <h2>Curso escolar: {{ $curso_escolar ?? 'sin definir' }}</h2>
            <form action="{{ route('matricula.store') }}" method="post">
                @csrf
                <input type="hidden" name="alumno_id" value="{{ $alumno->id }}">
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
<hr>
@endsection