<!-- Extendemos el contenido con el diseño de esta  pagina -->
@extends('Layouts.app')

<!-- Titulo de la paguina -->
@section('title')
    Buscar propietarios
@endsection

<!-- Contenido de la paguina -->
@section('content')
    <!-- Contenido de la paguina -->
    <h1>Buscar propietarios</h1>
    {{-- @dump($post) --}}

    @foreach($post as $content)
        <h2>{{ $content['title']}}</h2>
    @endforeach

@endsection
