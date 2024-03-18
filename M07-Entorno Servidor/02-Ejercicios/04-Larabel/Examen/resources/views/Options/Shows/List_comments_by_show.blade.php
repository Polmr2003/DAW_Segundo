@extends('Layouts.app')

@section('title')
Listar propietarios
@endsection

@section('content')
<h1 class="title">Lista de comentarios del show</h1>

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Título del show</th>
                <th scope="col">Título del comentario</th>
                <th scope="col">Descripción</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($comments as $comment)
            <tr>
                @foreach ($show as $shows)
                <td>{{ $shows->nombre }}</td>
                @endforeach

                <td>{{ $comment->titulo }}</td>
                <td>{{ $comment->descripcion }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection