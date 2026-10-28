@extends('template.base')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <form action="" method="post">
                @csrf
                <div class="mb-3">
                    <label for="alumno_id" class="form-label">Alumno que se matricula</label>
                    <select name="alumno_id" id="alumno_id" class="form-select">
                    </select>
                </div>
                <div class="mb-3">
                    <label for="modulo_id" class="form-label">Módulo en el que se matricula</label>
                    <select name="modulo_id" id="modulo_id" class="form-select">
                    </select>
                </div>
                <button class="btn btn-secondary" type="submit">Matricular</button>
            </form>
        </div>
    </div>
</div>
@endsection