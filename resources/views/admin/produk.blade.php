@extends('layouts.kasir')

@section('layout')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <br>

                <div>
                    <a href="{{ Route('admin.produk_create') }}" class="card-title mb-0 btn btn-warning">Tambah Produk</a>
                </div>

                <div class="card mt-4">
                    <div class="card-header d-flex justify-content-between align-items-center" style="background-color: black">
                        <h5 class="card-title mb-0" style="color: #ffd900;">Daftar Produk</h5>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Harga Barang</th>
                                    <th>Stok Barang</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $counter = ($produk->currentPage() - 1) * $produk->perPage() + 1; @endphp
                                @foreach ($produk as $pro)
                                    @if ($pro->IsDelete == 0)
                                        <tr>
                                            <td>{{ $counter++ }}</td>
                                            <td>{{ $pro->nama_produk }}</td>
                                            <td>Rp. {{ number_format($pro->harga, 0, ',', '.') }}</td>
                                            <td>{{ $pro->stok }}</td>
                                            <td>
                                                <a href="{{ Route('admin.produk_edit',$pro->id) }}"
                                                    class="btn btn-warning">Edit</a>
                                                <a href="{{ Route('admin.destroy_produk',$pro->id) }}"
                                                    class="btn btn-danger">Hapus</a>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>

                        </table>
                        {{ $produk->links() }}

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
