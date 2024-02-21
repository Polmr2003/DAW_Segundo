<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Titulo -->
    <title>@yield('title')</title>

    <!-- META TAGS -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- css, folder VENDORS -->
    <link href="{{ asset('vendors/bootstrap-5.3.2-dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('vendors/bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js') }}"></script>

    <!-- js, folder VENDORS-->
    <link href="{{ asset('vendors/jquery-3.5.1/jquery-3.5.1.min.js') }}" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>


    <!-- css-->
    <link href="{{ asset('css/body.css') }}" rel="stylesheet">
    <link href="{{ asset('css/header.css') }}" rel="stylesheet">

</head>