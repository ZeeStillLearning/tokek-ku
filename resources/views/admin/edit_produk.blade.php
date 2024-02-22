@extends('layouts.kasir')

@section('layout')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header bg-black">
                        <h5 class="card-title" style="color: #ffd900">Edit Produk</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.update_produk', $produk->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="username" class="col-sm-2 col-form-label">Nama Produk :</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nama_produk" name="nama_produk"
                                        placeholder="Masukkan Nama Produk" value="{{ $produk->nama_produk }}">
                                </div>
                            </div>
                            <div class="form-group row mt-2">
                                <label for="password" class="col-sm-2 col-form-label">Harga Produk :</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="harga"
                                            placeholder="Masukkan Harga" value="{{ $produk->harga }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mt-2">
                                <label for="role" class="col-sm-2 col-form-label">Stok :</label>
                                <div class="col-sm-10">
                                    <input type="number" name="stok" placeholder="Masukkan Stok" class="form-control"
                                        value="{{ $produk->stok }}">
                                </div>
                            </div>
                            <div class="form-group row mt-3">
                                <div class="col-sm-10 offset-sm-2">
                                    <button type="submit" class="btn btn-warning">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const icon = this.querySelector('i');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            }
        });
        @if (session()->has('gagal'))
            alert('{{ session()->get('gagal') }}');
        @endif
    </script>
@endsection
