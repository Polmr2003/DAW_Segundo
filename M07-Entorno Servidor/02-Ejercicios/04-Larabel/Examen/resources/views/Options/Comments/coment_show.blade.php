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
                    <form action="{{ route('show.update_val', $shows->id) }}" method="get">
                        <!-- Token necesario para hacer el create -->
                        @csrf

                        <div class="form-group">
                            <label>Id de el show:</label>
                            <input type="number" class="form-control" value="{{ $shows->id }}" name="id" readonly>
                        </div>

                        <div class="form-group">
                            <label>Valoracion *:</label>
                            <input type="text" class="form-control" placeholder="Pon la valoracion" name="valoracion">
                        </div>

                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" value="Valorar">
                        </div>
                    </form>
                @endforeach
            </div>
        </div>
        <!-- Paginator -->
    </div>
@endsection
