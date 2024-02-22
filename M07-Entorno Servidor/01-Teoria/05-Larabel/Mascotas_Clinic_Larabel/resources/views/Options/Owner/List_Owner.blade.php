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
        <h1 class="title">Lista de propietarios</h1>
    </u>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">email</th>
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
                        <td id="buton"><button type="button" class="btn btn-success">Modificar Propietario</button></td>
                        <td id="buton"><button type="button" class="btn btn-danger">Eliminar Propietario</button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
