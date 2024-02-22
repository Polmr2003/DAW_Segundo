<!-- Extendemos el contenido con el diseño de esta  pagina -->
@extends('Layouts.app')

<!-- Titulo de la paguina -->
@section('title')
    Modificar propietarios
@endsection

<!-- Contenido de la paguina -->
@section('content')
    <!-- Contenido -->

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center">
                <form method="post" action="{{ route('Owner.store') }}">
                    <!-- Token necesario para hacer el create -->
                    @csrf

                    <!-- Titulo -->
                    <u>
                        <h1 class="title">Crear propietarios</h1>
                    </u>

                    <!-- Pedimos el nombre -->
                    <div class="form-group">
                        <label>Name *:</label>
                        <div>
                            <input type="text" class="form-control" placeholder="Name" name="name">
                        </div>
                    </div>

                    <!-- Pedimos el email -->
                    <div class="form-group">
                        <label class="control-label">Email *:</label>
                        <div>
                            <input type="text" class="form-control" placeholder="Email" name="email">
                        </div>
                    </div>

                    <p>* Required fields</p>

                    <div class="form-group">
                        <input class="btn btn-success" type="submit" name="action" value="add">
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
