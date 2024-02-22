@extends('layouts.kasir')

@section('layout')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header d-flex justify-content-between align-items-center"
                        style="background-color: black">
                        <h5 class="card-title mb-0" style="color: #ffd900">Tambah Produk</h5>
                    </div>

                    <div class="card-body">
                        <form action="{{ Route('admin.produk_store') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="username" class="col-sm-2 col-form-label">Nama Produk :</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nama_produk" name="nama_produk"
                                        placeholder="Masukkan Nama Produk">
                                </div>
                            </div>
                            <div class="form-group row mt-2">
                                <label for="password" class="col-sm-2 col-form-label">Harga Produk :</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="harga"
                                            placeholder="Masukkan Harga">
                                    </div>
                                </div>
                            </div>


                            <div class="form-group row mt-2">
                                <label for="role" class="col-sm-2 col-form-label">Stok :</label>
                                <div class="col-sm-10">
                                    <input type="number" name="stok" placeholder="Masukkan Stok" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <div class="col-sm-10 offset-sm-2">
                                    <button type="submit" class="btn btn-warning">Tambah Data</button>
                                </div>
                            </div>
                        </form>
                    </div>


                </div>


            </div>
        </div>
    </div>
    <style>
        .input-group-append {
            position: absolute;
            right: 0;
            top: 0;
            height: 100%;
        }
    </style>
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
