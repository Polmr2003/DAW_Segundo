<!-- Extendemos el contenido con el diseño de esta  pagina -->
@extends('Layouts.app')

<!-- Titulo de la paguina -->
@section('title')
    Listar propietarios
@endsection

<!-- Contenido de la paguina -->
@section('content')
    <!-- Contenido -->

    <!-- Si esta definida la variable de sesion success nos mostrara el texto que tenga esa variable-->
    @if (Session::get('success'))
        <div class="alert alert-success" id="div_info_success">
            <strong>{{ Session::get('success') }}</strong><br>
        </div>
    @endif

    <u>
        <h1 class="title">Bienvenido</h1>
    </u>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Valoracion</th>
                    <th scope="col">img</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($show as $shows)
                    <tr>
                        <td>{{ $shows->id }}</td>
                        <td>{{ $shows->valoracion }}</td>
                        <td><img src="{{ asset('img/2.jpg') }}" alt="" style="max-width: 200px"></td>
                    </tr>
                    {{-- <!-- Incluimos la vista tipo modal donde esta modificar usuarios -->
            @include('Options.Owner.Modify_Owner_Modal')

            <!-- Incluimos la vista tipo modal donde esta eliminar usuarios -->
            @include('Options.Owner.Delete_Owner_Modal') --}}
                @endforeach
            </tbody>
        </table>
        <!-- Paginator -->
        {{-- {{$owners->links()}} --}}
    </div>
@endsection
