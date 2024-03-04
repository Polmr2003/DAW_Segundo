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

                <!-- mostramos los errores al introducir los campos -->
                @if ($errors->any())
                    <div class="alert alert-danger" id="div_info">
                        <strong>Error:</strong><br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Formulario donde añadimos el usuario -->
                <form action="{{ route('Owner.store') }}" method="post">
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

                    <!-- Seleccionar sexe -->
                    <div class="form-group">
                        <label>Sexe *:</label>
                        <select class="form-control" name="sexe">
                            @foreach ($enum as $option)
                                <option value="{{ $option }}">{{ $option }}</option>
                            @endforeach
                        </select>
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
