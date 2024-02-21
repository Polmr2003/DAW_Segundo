<!-- Extendemos el contenido con el diseño de esta  pagina -->
@extends('Layouts.app')

<!-- Titulo de la paguina -->
@section('title')
Listar propietarios
@endsection

<!-- Contenido de la paguina -->
@section('content')
<!-- Contenido de la paguina -->
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
      </tr>
    </thead>
    <tbody>
      @foreach ($owners as $owner)
      <tr>
        <td>{{$owner->id}}</td>
        <td>{{$owner->name}}</td>
        <td>{{$owner->email}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>


@endsection