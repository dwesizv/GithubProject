@extends('template.base')

@section('before-content')
<!--<div class="container">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <a href="{{ route('alumno.create') }}" class="btn btn-secondary">Create</a>
        </div>
    </div>
</div>-->
@endsection

@section('content')
<div class="container">
    <h1>Alumnos</h1>
    <a href="{{ route('alumno.create') }}" class="btn btn-secondary mb-3">Crear Alumno</a>
    <a href="{{ route('modulo.create') }}" class="btn btn-secondary mb-3">Crear Módulo</a>
    <a href="{{ route('alumno.index') }}" class="btn btn-secondary mb-3">Ver Alumnos</a>
    <a href="{{ route('modulo.index') }}" class="btn btn-secondary mb-3">Ver Módulos</a>
    <hr>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <table class="table table-hover">
                @foreach($alumnos as $alumno)
                    <tr>
                        <td>{{ $alumno->id }}</td>
                        <td>{{ $alumno->nombre }}</td>
                        <td>{{ $alumno->apellidos }}</td>
                        <td>{{ Carbon\Carbon::parse($alumno->fnac)->locale('es')->translatedFormat('d/m/Y') }}</td>
                        <td>{{ $alumno->genero }}</td>
                        <td>{{ $alumno->nacceso }}</td>
                        <td>
                            <a href="{{ route('alumno.show', $alumno) }}" class="btn btn-secondary">View</a>
                            <a href="{{ route('alumno.edit', $alumno) }}" class="btn btn-secondary">Edit</a>
                            <!--<a href="{{ route('index') }}" class="btn btn-secondary">Delete</a>-->
                            <form data-message="{{ $alumno->apellidos . ', ' . $alumno->nombre }}" class="confirm-dialog" action="{{ route('alumno.destroy', $alumno) }}" method="post" style="display: inline;">
                                @csrf
                                @method('delete')
                                <input type="submit" value="Delete" class="btn btn-secondary">
                                <!--<button type="submit" class="btn btn-secondary">Delete</button>-->
                            </form>
                            <a href="{{ route('alumno.matricular', $alumno) }}" class="btn btn-secondary">Matrículas</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    document.querySelectorAll('form.confirm-dialog').forEach(
        form => {
            form.addEventListener('submit', e => {
                const message = '¿Seguro que quieres borrar al alumno ' + form.dataset.message + '?';
                if(!confirm(message)) {
                    e.preventDefault();
                }
            });
        }
    );
</script>
@endsection