@extends('layouts.kasir')

@section('layout')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @php
                    $userId = session('user_id');

                    $user = \App\Models\users::find($userId);
                    $Name = $user ? $user->name : null;
                @endphp
                <h3 style="font-family: 'Poppins',sans-serif; margin-top:25px;">Selamat Datang, {{ $Name }}</h3>
                <br>
                <div class="card mt-4">
                    <div class="card-header d-flex justify-content-between align-items-center"
                        style="background-color: black">
                        <h5 class="card-title mb-0" style="color: #ffd900">Daftar Transaksi</h5>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Transaksi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($penjualans as $key => $penjualan)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $penjualan->created_at ? $penjualan->created_at->isoFormat('dddd, D MMMM YYYY / H:mm:ss') : '' }}
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.show', $penjualan->id) }}"
                                                class="btn btn-warning">Detail</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script>
        @if (session()->has('gagal'))
            alert('{{ session()->get('gagal') }}');
        @endif
    </script>
@endsection
