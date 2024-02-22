<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tokek-Ku</title>
    <link rel="icon" href="{{ asset('/rieper.png') }}">
    <link rel="stylesheet" href="/boostrap/css/bootstrap.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">

    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: 'Poppins', sans-serif;
            background-color: #404144;
        }

        .card {
            transform: scale(1.3);
            width: 400px;
            padding: 20px;
            border-radius: 7%;
            background-color: black;
        }
    </style>
</head>

<body>
    <div class="card">
        <h5 class="card-title text-center fw-bold " style="margin-bottom: 5%; color:#ffd900">TOKO ELEKTRONIKU</h5>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name" class="form-label" style="color: #ffd900">Masukkan Username</label>
                <input type="text" class="form-control" name="name" placeholder="Username">
            </div>
            <div class="form-group mt-2">
                <label for="password" class="form-label" style="color: #ffd900">Masukkan Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <div class="d-grid gap-2">
                <button class="btn btn-warning mt-2" type="submit">Login</button>
            </div>
        </form>
    </div>
    <script>
        @if (session()->has('gagal'))
            alert('{{ session()->get('gagal') }}');
        @endif
    </script>
    <script src="/boostrap/js/bootstrap.min.js"></script>
</body>

</html>
