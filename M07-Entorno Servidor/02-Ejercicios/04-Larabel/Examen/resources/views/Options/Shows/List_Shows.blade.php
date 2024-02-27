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
        <h1 class="title">Lista de shows</h1>
    </u>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Titulo</th>
                    <th scope="col">Img</th>
                    <th scope="col">INFO</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($show as $shows)
                    <tr>
                        <td>{{ $shows->name }}</td>
                        <td><img src="{{ asset('img/2.jpg') }}" alt=""></td>
                        <td>
                            <form action="{{ route('show.info') }}">
                                <!-- Token necesario para hacer el create -->
                                <input type="text" value="{{ $shows->id }}" name="id" style="display: none">
                                <button type="submit">INFO</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Paginator -->
        {{ $show->links() }}
    </div>
@endsection
