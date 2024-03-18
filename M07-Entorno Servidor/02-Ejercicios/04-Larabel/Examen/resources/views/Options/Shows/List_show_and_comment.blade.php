<!-- Extendemos el contenido con el diseño de esta  pagina -->
@extends('Layouts.app')

<!-- Titulo de la paguina -->
@section('title')
Listar propietarios
@endsection

<!-- Contenido de la paguina -->
@section('content')
<!-- Contenido -->

<u>
    <h1 class="title">Lista de shows i ver comentarios</h1>
</u>

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Img</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($show as $shows)
            <tr>
                <td>{{ $shows->nombre }}</td>
                <td><img src="{{ asset('img/2.jpg') }}" alt="" style="max-width: 200px"></td>
                <td>
                    <a href="{{ route('show.view_comments', ['id' => $shows->id]) }}" class="btn btn-primary">VER COMMENTS</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Paginator -->
    {{ $show->links() }}
</div>
@endsection