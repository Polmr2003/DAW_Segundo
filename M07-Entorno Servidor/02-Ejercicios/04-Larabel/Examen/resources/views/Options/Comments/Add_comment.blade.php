<!-- Extendemos el contenido con el diseño de esta  pagina -->
@extends('Layouts.app')

<!-- Titulo de la paguina -->
@section('title')
    Buscar propietarios
@endsection

<!-- Contenido de la paguina -->
@section('content')
    <!-- Contenido -->
    <h1 class="title">Comentar</h1>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center">

                @foreach ($show as $shows)
                    <!-- Formulario donde añadimos el usuario -->
                    <form action="{{ route('comment.store_comment') }}" method="get">
                        <!-- Token necesario para hacer el create -->
                        @csrf

                        <div class="form-group">
                            <label>Id de el show:</label>
                            <input type="number" class="form-control" value="{{ $shows->id }}" name="id" readonly>
                        </div>

                        <div class="form-group">
                            <label>Titulo:</label>
                            <input type="text" class="form-control" name="titulo">
                        </div>

                        <div class="form-group">
                            <label>Descripcion *:</label>
                                <textarea class="form-control" name="descripcion" rows="5"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Fecha *:</label>
                            <input type="date" class="form-control" name="fecha">
                        </div>

                        <div class="form-group">
                            <label>Autor *:</label>
                            <input type="text" class="form-control" name="autor">
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
