<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TOKO ELEKTRONIK KU</title>
    <link rel="stylesheet" href="/boostrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>
    @include('partials.navbar')

    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <style>
                body {
                    font-family: 'Poppins', sans-serif;
                    background-color: #dcdcdc;

                }
            </style>



            @yield('layout')

        </div>


    </div>

    <script>
        @if (session()->has('gagal'))
            alert('{{ session()->get('gagal') }}');
        @endif
    </script>
    <script src="/boostrap/js/bootstrap.min.js"></script>


</body>

</html>
