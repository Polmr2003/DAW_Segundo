<!-- Extendemos el contenido con el diseño de esta  pagina -->
@extends('Layouts.app')

<!-- Titulo de la paguina -->
@section('title')
Listar propietarios
@endsection

<!-- Contenido de la paguina -->
@section('content')
<!-- Contenido -->

<!-- Si esta definida la variable de sesion success nos mostrara el texto que tenga esa variable-->
@if(Session::get('success'))
<div class="alert alert-success" id="div_info_success">
    <strong>{{Session::get('success')}}</strong><br>
</div>

@endif

<u>
    <h1 class="title">Lista de shows i comentar</h1>
</u>

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Titulo del comentario</th>
                <th scope="col">descripcion</th>
                <th scope="col">Titulo del show</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($comment as $comments)
            <tr>
                <td>{{ $comments->titulo }}</td>
                <td>{{ $comments->descripcion }}</td>
                <td>{{ $comments->show->nombre }}</td>
                <td>
                    <a href="{{ route('comment.update_form', ['id' => $comments->id]) }}" class="btn btn-primary">Actualizar Comentario</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Paginator -->
</div>
@endsection