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
                <h3 style="font-family: 'Poppins',sans-serif; margin-top:30px;">Selamat Datang, {{ $Name }}</h3>
                <br>
                <div class="card mt-2">
                    <div class="card-header d-flex justify-content-between align-items-center"
                        style="background-color: black">
                        <h5 class="card-title mb-0" style="color: #ffd900">Daftar Transaksi</h5>
                        <a href="{{ route('kasir.create') }}" class="btn btn-warning">Tambah Transaksi</a>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pembeli</th>
                                    <th>Total Transaksi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($penjualans as $key => $penjualan)
                                    @if ($penjualan->IsDelete == 0)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $penjualan->nama_pelanggan }}</td>
                                            <td>{{ $penjualan->total_harga }}</td>
                                            <td>
                                                <a href="{{ route('kasir.show', $penjualan->id) }}"
                                                    class="btn btn-warning">Detail</a>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
