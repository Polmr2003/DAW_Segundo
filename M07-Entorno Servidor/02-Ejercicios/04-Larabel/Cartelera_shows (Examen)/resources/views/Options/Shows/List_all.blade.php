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
    <h1 class="title">Lista de shows</h1>
</u>

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Img</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($show as $shows)
            <tr>
                <td>{{ $shows->nombre }}</td>
                <td> <a href="{{ route('show.list_info', ['id' => $shows->id]) }}"> <!-- Link a la vista i le pasamos el id de el show -->
                        <img src="{{ asset('img/2.jpg') }}" alt="" style="max-width: 200px"></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Paginator -->
    {{ $show->links() }}
</div>
@endsection