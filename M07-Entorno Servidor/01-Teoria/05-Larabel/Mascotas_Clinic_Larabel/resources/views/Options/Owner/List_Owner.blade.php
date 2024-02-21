<!-- Extendemos el contenido con el diseño de esta  pagina -->
@extends('Layouts.app')

<!-- Titulo de la paguina -->
@section('title')
    Listar propietarios
@endsection

<!-- Contenido de la paguina -->
@section('content')
    <!-- Contenido de la paguina -->
    <h1>Listar propietarios</h1>

    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">email</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($owners as $owner)
                    <tr class="">
                        <td scope="row">{{$owner->id}}</td>
                        <td scope="row">{{$owner->name}}</td>
                        <td scope="row">{{$owner->email}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
