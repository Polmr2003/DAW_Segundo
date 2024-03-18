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
    <h1 class="title">Info del show</h1>
</u>

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Duracion</th>
                <th scope="col">Fechas</th>
                <th scope="col">Idioma</th>
                <th scope="col">Precio</th>
                <th scope="col">Valoracion</th>
                <th scope="col">Img</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($show as $shows)
            <tr>
                <td>{{ $shows->id }}</td>
                <td>{{ $shows->nombre }}</td>
                <td>{{ $shows->duracion }}</td>
                <td>{{ $shows->fechas }}</td>
                <td>{{ $shows->idiomas }}</td>
                <td>{{ $shows->precio }}</td>
                <td>{{ $shows->valoracion }}</td>
                <td><img src="{{ asset('img/2.jpg') }}" alt="" style="max-width: 200px"></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


<u>
    <h1 class="title">Categorias</h1>
</u>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Nombre de la categoria a la que pertenece</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categoria_del_show as $categorias)
            <tr>
                <td>{{ $categorias->categoria }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection