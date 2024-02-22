{{-- <style>
    body {
        font-family: 'Poppins', sans-serif;
    }
</style>
<nav class="navbar navbar-expand-lg bg-black">
    <div class="container-fluid">
        <a class="navbar-brand" style="color:#ffd900; margin-top: 10px">
            <img src="{{ asset('img/shop.svg') }}" alt="" style="width: 40px; color:aquamarine;">
            TOKEK
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav" >
                @php
                    $userId = session('user_id');

                    $user = \App\Models\users::find($userId);
                    $user_type = $user ? $user->user_type : null;
                @endphp
                @if ($user_type == 'admin')
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ Route('admin.index') }}"
                            style="color: #ffd900">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ Route('admin.produk') }}"
                            style="color: #ffd900">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ Route('admin.kasir') }}"
                            style="color: #ffd900">Kasir</a>
                    </li>
                    <li class="nav-item" style="margin-left: 78pc;">
                        <a class="nav-link active" aria-current="page" href="/logout"
                            style="color: #ffd900">Logout</a>
                    </li>
                @endif
                <li class="nav-item" style="margin-left: 90pc;">
                    <a class="nav-link active" aria-current="page" href="/logout" style="color: #ffd900">Logout</a>
                </li>
            </ul>
        </div>

    </div>
</nav> --}}
<nav class="navbar bg-black ">
    <div class="container-fluid">
        <button class="navbar-toggler" style="background-color: #ffd900; color:black;" type="button"
            data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" style="color: #ffd900; margin-right:50pc; font-weight: bold;"href="">TOKEK-KU</a>
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar"
            aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header" style="background-color: #ffd900; border: 5px solid black;">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel" style="font-weight:bold;">TOKEK-KU</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body bg-black">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    @php
                        $userId = session('user_id');

                        $user = \App\Models\users::find($userId);
                        $user_type = $user ? $user->user_type : null;
                    @endphp
                    @if ($user_type == 'admin')
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" style="color: #ffd900"
                                href="{{ Route('admin.index') }}">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" style="color: #ffd900"
                                href="{{ Route('admin.produk') }}">Produk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" style="color: #ffd900"
                                href="{{ Route('admin.kasir') }}">Kasir</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" style="color: #ffd900" href="/logout">Logout</a>
                    </li>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
