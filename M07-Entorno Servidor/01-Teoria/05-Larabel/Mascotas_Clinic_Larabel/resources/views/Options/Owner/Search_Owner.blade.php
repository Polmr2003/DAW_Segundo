<!-- Extendemos el contenido con el diseño de esta  pagina -->
@extends('Layouts.app')

<!-- Titulo de la paguina -->
@section('title')
Buscar propietarios
@endsection

<!-- Contenido de la paguina -->
@section('content')
<!-- Contenido -->
<h1>Buscar propietarios</h1>

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
            <form action="{{ route('Owner.search') }}" method="get">
                <!-- Token necesario para hacer el create -->
                @csrf
                
                <div class="form-group">
                    <label>Id *:</label>
                    <input type="number" class="form-control" placeholder="Id" name="id">
                </div>
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" value="Buscar">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection