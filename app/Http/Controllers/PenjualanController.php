<?php

namespace App\Http\Controllers;

use App\Models\DetailPenjualan;
use App\Models\penjualan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

use App\Models\produk;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $req)
    {
        if (!$req->session()->has('user_id') || $req->session()->get('user_type') !== 'kasir') {
            //
            return redirect('404')->with('error', 'Anda tidak diizinkan mengakses halaman ini.');
        }
        $user_id = $req->session()->get('user_id', 'id_user ');

        $penjualans = penjualan::all();

        return view('kasir.index', compact('penjualans'));
    }

    public function create()
    {
        $produks = Produk::all();
        return view('kasir.tambah_penjualan', compact('produks'));
    }


    public function store(Request $request)
    {
        $totalHarga = 0;

        $penjualan = Penjualan::create([
            'nama_pelanggan' => $request->nama_pelanggan,
            'id_user' => session('user_id'),

            'total_harga' => array_sum($request->sub_total),
            'user_id' => session('user_id'),
        ]);

        foreach ($request->produk_id as $key => $value) {
            $produk = Produk::find($value);
            $hargaAwal = $produk->harga;

            if ($produk->stok < $request->jumlah_produk[$key]) {
                return redirect()->back()->with('error', 'Stok Produk ' . $produk->nama_produk . ' tidak mencukupi');
            }

            $subTotal = $hargaAwal * $request->jumlah_produk[$key];
            $totalHarga += $subTotal;

            $produk->stok -= $request->jumlah_produk[$key];
            $produk->save();

            DetailPenjualan::create([
                'penjualan_id' => $penjualan->id,
                'produk_id' => $value,
                'jumlah_produk' => $request->jumlah_produk[$key],
                'sub_total' => $subTotal,
            ]);
        }
        return redirect()->route('kasir.index')->with('sukses', 'penjualan berhasil ditambahkan');
    }



    public function show($id)
    {
        $penjualan = Penjualan::with('details.produk')->findOrFail($id);
        return view('kasir.show', compact('penjualan'));
    }

    public function transaksi($id)
    {
        $penjualan = Penjualan::findOrFail($id);
        $data = [
            'nomor_transaksi' => $penjualan->id,
            'tanggal_transaksi' => $penjualan->created_at ? $penjualan->created_at->format('d M Y H:i:s') : '-',
            'nama_pelanggan' => $penjualan->nama_pelanggan,
            'total_harga' => $penjualan->total_harga,
            'details' => $penjualan->details,
        ];

        return view('');
    }
}
