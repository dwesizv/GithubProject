@extends('template.base')

@section('before-content')
<!--<div class="container">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <a href="{{ route('modulo.create') }}" class="btn btn-secondary">Create</a>
        </div>
    </div>
</div>-->
@endsection

@section('content')
<div class="container">
    <h1>Módulos</h1>
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
                @foreach($modulos as $modulo)
                    <tr>
                        <td>{{ $modulo->id }}</td>
                        <td>{{ $modulo->nombre }}</td>
                        <td>{{ $modulo->abreviatura }}</td>
                        <td>{{ $modulo->horas }}h</td>
                        <td>{{ $modulo->creditos }} créditos</td>
                        <td>
                            <a href="{{ route('modulo.show', $modulo) }}" class="btn btn-secondary">View</a>
                            <a href="{{ route('modulo.edit', $modulo) }}" class="btn btn-secondary">Edit</a>
                            <form data-message="{{ $modulo->nombre }}" class="confirm-dialog" action="{{ route('modulo.destroy', $modulo) }}" method="post" style="display: inline;">
                                @csrf
                                @method('delete')
                                <input type="submit" value="Delete" class="btn btn-secondary">
                            </form>
                            <a href="{{ route('modulo.show', $modulo) }}" class="btn btn-secondary">Matrículas</a>
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
                const message = '¿Seguro que quieres borrar al módulo ' + form.dataset.message + '?';
                if(!confirm(message)) {
                    e.preventDefault();
                }
            });
        }
    );
</script>
@endsection