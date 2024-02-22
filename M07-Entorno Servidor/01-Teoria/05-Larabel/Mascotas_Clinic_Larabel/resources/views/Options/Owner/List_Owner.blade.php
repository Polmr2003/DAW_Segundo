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
    <h1 class="title">Lista de propietarios</h1>
</u>

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Email</th>
                <th scope="col">Modificar</th>
                <th scope="col">Eliminar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($owners as $owner)
            <tr>
                <td>{{ $owner->id }}</td>
                <td>{{ $owner->name }}</td>
                <td>{{ $owner->email }}</td>
                <td id="buton">
                    <!-- Boton tipo modal -->
                    <button type="button" class="btn btn-success btn-log" data-bs-toggle="modal" data-bs-target="#modify{{ $owner->id }}">
                        Modificar Propietario
                    </button>
                </td>
                <td id="buton">
                    <!-- Boton tipo modal -->
                    <button type="button" class="btn btn-danger btn-log" data-bs-toggle="modal" data-bs-target="#delete{{ $owner->id }}">
                        Eliminar Propietario
                    </button>
                </td>
            </tr>
            <!-- Incluimos la vista tipo modal donde esta modificar usuarios -->
            @include('Options.Owner.Modify_Owner_Modal')

            <!-- Incluimos la vista tipo modal donde esta eliminar usuarios -->
            @include('Options.Owner.Delete_Owner_Modal')
            @endforeach
        </tbody>
    </table>
    <!-- Paginator -->
    {{$owners->links()}}
</div>


@endsection