<!-- Extendemos el contenido con el diseño de esta  pagina -->
@extends('Layouts.app')

<!-- Titulo de la paguina -->
@section('title')
    Buscar propietarios
@endsection

<!-- Contenido de la paguina -->
@section('content')
    <!-- Contenido -->
    <h1 class="title">Actualizar Comentario</h1>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center">

                @foreach ($comment as $comments)
                    <!-- Formulario donde añadimos el usuario -->
                    <form action="{{ route('comment.update_comment') }}" method="get">
                        <!-- Token necesario para hacer el create -->
                        @csrf

                        <div class="form-group">
                            <label>Comentario id:</label>
                            <input type="number" class="form-control" value="{{ $comments->id }}" name="id" readonly>
                        </div>

                        <div class="form-group">
                            <label>Titulo:</label>
                            <input type="text" class="form-control" value="{{ $comments->titulo }}" name="titulo">
                        </div>

                        <div class="form-group">
                            <label>Descripcion *:</label>
                                <textarea class="form-control" name="descripcion" rows="5">{{ $comments->descripcion }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Fecha *:</label>
                            <input type="date" class="form-control" value="{{ $comments->fecha }}" name="fecha">
                        </div>

                        <div class="form-group">
                            <label>Autor *:</label>
                            <input type="text" class="form-control" value="{{ $comments->autor }}" name="autor">
                        </div>

                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" value="Comentar">
                        </div>
                    </form>
                @endforeach
            </div>
        </div>
        <!-- Paginator -->
    </div>
@endsection
