<html>

<!-- Header de la paguina -->
@include('Menu.header')
<link href="{{ asset('css/body.css') }}" rel="stylesheet">
<h1>Clínica Veterinaria</h1>
<body>
    <!-- Incluimos la vista navigation donde esta el menu -->
    @include('Menu.navigation')

    <!-- Contenido de la pagina -->
    @yield('content')

</body>

</html>
