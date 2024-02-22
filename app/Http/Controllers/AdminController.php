<?php

namespace App\Http\Controllers;

use App\Models\penjualan;
use App\Models\produk;
use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //

    public function index(Request $req)
    {
        if (!$req->session()->has('user_id') || $req->session()->get('user_type') !== 'admin') {

            return redirect('404')->with('error', 'Anda tidak diizinkan mengakses halaman ini.');
        }
        $user_id = $req->session()->get('user_id');

        $penjualans = penjualan::all();

        return view('admin.index', compact('penjualans'));
    }

    public function kasir(Request $req)
    {
        if (!$req->session()->has('user_id') || $req->session()->get('user_type') !== 'admin') {

            return redirect('404')->with('error', 'Anda tidak diizinkan mengakses halaman ini.');
        }

        $kasir = users::where('user_type', 'kasir')
            ->where('IsDelete', 0)
            ->paginate(5);

        return view('admin.kasir', ['kasir' => $kasir]);
    }
    public function product(Request $req)
    {
        if (!$req->session()->has('user_id') || $req->session()->get('user_type') !== 'admin') {

            return redirect('404')->with('error', 'Anda tidak diizinkan mengakses halaman ini.');
        }

        $produk = produk::where('IsDelete', 0)->paginate(5);

        return view('admin.produk', compact('produk'));
    }
    public function create_kasir()
    {
        return view('admin.tambah_kasir');
    }
    public function create_product()
    {
        return view('admin.tambah_produk');
    }

    public function store_kasir(Request $req)
    {
        $passwordHash = Hash::make($req->password);


        users::create([
            'name' => $req->name,
            'password' => $passwordHash,
            'user_type' => $req->user_type,
            'IsDelete' => 0,
        ]);

        return redirect()->route('admin.kasir')->with('sukses', 'Data berhasil ditambahkan');
    }

    public function store_product(Request $req)
    {
        produk::create([
            'nama_produk' => $req->nama_produk,
            'harga' => $req->harga,
            'stok' => $req->stok,
        ]);

        return redirect()->route('admin.produk')->with('sukses', 'Data berhasil ditambahkan');
    }

    public function edit_kasir($id)
    {
        $kasir = users::findOrFail($id);
        return view('admin.edit_kasir', compact('kasir'));
    }

    public function edit_product($id)
    {
        $produk = produk::findOrFail($id);
        return view('admin.edit_produk', compact('produk'));
    }

    public function update_kasir(Request $req, $id)
    {
        $req->validate([
            'name' => 'required|string|max:255',
            'password' => 'nullable|string|min:3',
        ]);

        $kasir = users::findOrFail($id);

        $kasir->name = $req->name;

        if ($req->password) {
            $kasir->password = Hash::make($req->password);
        }

        $kasir->save();

        return redirect()->route('admin.kasir')->with('sukses', 'Data berhasil diperbaharui');
    }

    public function update_product(Request $req, $id)
    {
        $produk = produk::findOrFail($id);

        $produk->nama_produk = $req->nama_produk;
        $produk->harga = $req->harga;
        $produk->stok = $req->stok;

        $produk->save();

        return redirect()->route('admin.produk')->with('sukses', 'Data berhasil diperbaharui');
    }

    public function destroy_kasir($id)
    {
        $kasir = users::findOrFail($id);

        $kasir->delete();

        return redirect()->route('admin.kasir')->with('sukses', 'Data berhasil dihapus');
    }

    public function destroy_product($id)
    {
        $produk = produk::findOrFail($id);

        $produk->delete();

        return redirect()->route('admin.produk')->with('sukses', 'Data berhasil dihapus');
    }

    public function show($id)
    {
        $penjualan = penjualan::with('details.produk')->findOrFail($id);
        return view('admin.show', compact('penjualan'));
    }
}
