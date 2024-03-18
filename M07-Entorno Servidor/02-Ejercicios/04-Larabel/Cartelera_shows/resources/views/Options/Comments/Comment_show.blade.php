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
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Img</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($show as $shows)
            <tr>
                <td>{{ $shows->id }}</td>
                <td>{{ $shows->nombre }}</td>
                <td><img src="{{ asset('img/2.jpg') }}" alt="" style="max-width: 200px"></td>
                <td>
                    <a href="{{ route('comment.add_comment', ['id' => $shows->id]) }}" class="btn btn-primary">Comentar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Paginator -->
    {{ $show->links() }}
</div>
@endsection