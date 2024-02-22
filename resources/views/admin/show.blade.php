@extends('layouts.kasir')

@section('layout')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header" style="background-color: black">
                        <h5 class="card-title mb-0" style="color: #ffd900; font-weight:bold">Detail Penjualan</h5>

                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Nomor Transaksi:</strong> {{ $penjualan->id }}</p>
                                @if ($penjualan)
                                    <p><strong>Tanggal Transaksi:</strong>
                                        {{ $penjualan->created_at ? $penjualan->created_at->format('d M Y H:i:s') : '-' }}
                                    </p>
                                @else
                                    <p>Penjualan tidak ditemukan.</p>
                                @endif
                                <p><strong>Nama Pelanggan:</strong> {{ $penjualan->nama_pelanggan }}</p>
                            </div>
                            <div class="col-md-6 text-md-right">
                                <p><strong>Total Harga:</strong> Rp.
                                    {{ number_format($penjualan->total_harga, 0, ',', '.') }}</p>
                            </div>
                        </div>
                        <div class="table-responsive mt-4">
                            <table class="table" style="border: 2px solid black">
                                <thead>
                                    <tr style="color: #ffd900;" class="bg-black">
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Produk</th>
                                        <th scope="col">Jumlah</th>
                                        <th scope="col">Harga Satuan</th>
                                        <th scope="col">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($penjualan->details as $index => $detail)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $detail->produk->nama_produk }}</td>
                                            <td>{{ $detail->jumlah_produk }}</td>
                                            <td>Rp. {{ number_format($detail->produk->harga, 0, ',', '.') }}</td>
                                            <td>Rp. {{ number_format($detail->sub_total, 0, ',', '.') }}</td>

                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">Tidak ada detail penjualan tersedia.</td>
                                        </tr>
                                    @endforelse
                                </tbody>


                            </table>
                        </div>
                        <a href="{{ route('admin.index') }}" class="btn btn-warning mt-3">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
