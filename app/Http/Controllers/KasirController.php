<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\penjualan;

class KasirController extends Controller
{
    //
    public function index(Request $req)
    {
        if (!$req->session()->has('user_id') || $req->session()->get('user_type') !== 'kasir') {
            //
            return redirect('404')->with('error', 'Anda tidak diizinkan mengakses halaman ini.');
        }
        $user_id = $req->session()->get('user_id');



        return view('kasir.index');
    }
}
