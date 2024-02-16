<html>
<!-- Incluimos la vista header -->
@include('Menu.header')

<body>


    <h1>Laravel</h1>

    <!-- Incluimos la vista navigation donde esta el menu -->
    @include('Menu.navigation')

    <!-- Contenido de la pagina -->
    @yield('content')

</body>
