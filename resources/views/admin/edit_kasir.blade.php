@extends('layouts.kasir')

@section('layout')
    <div class="container" style="display: flex; justify-content: center; align-items: center;">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header bg-black">
                        <h5 class="card-title" style="color: #ffd900">Edit Petugas Kasir</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.update_kasir', $kasir->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Username :</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" style="border: 2px solid black"
                                        id="name" name="name" value="{{ $kasir->name }}">
                                </div>
                            </div>
                            <div class="form-group row mt-2">
                                <label for="password" class="col-sm-2 col-form-label">Password :</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <input type="password" class="form-control" style="border: 2px solid black"
                                            id="password" name="password"E placeholder="Masukkan password baru">
                                        <div class="input-group-append">
                                            <button class="btn " style="background-color: black" type="button"
                                                id="togglePassword">
                                                <img src="{{ asset('img/eye.svg') }}" alt="">
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mt-2">
                                <label for="role" class="col-sm-2 col-form-label">Role :</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="role" name="user_type"
                                        style="border: 2px solid black">
                                        <option value="kasir" selected>Kasir</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mt-3">
                                <div class="col-sm-10 offset-sm-2">
                                    <button type="submit" class="btn btn-warning"
                                        style="font-weight:bold; border: 2px solid black">Simpan</button>
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
    <style>
        .card {
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 700px;
            background-color: #fff;
        }

        .card-header {
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }

        .card-body {
            padding: 15px;
        }
    </style>
@endsection
