<html>

<!-- Header de la paguina -->
@include('Menu.header')

<!-- Css i img de la pagina -->
<link href="{{ asset('css/body.css') }}" rel="stylesheet">

<!-- Titulo de la paguina -->
<h1>Examen</h1>

<body>
    <!-- Incluimos la vista navigation donde esta el menu -->
    @include('Menu.navigation')

    <!-- Contenido de la pagina -->
    @yield('content')

</body>

</html>
