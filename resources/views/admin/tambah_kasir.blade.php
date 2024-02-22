@extends('layouts.kasir')

@section('layout')
    <div class="container" style="display: flex; justify-content: center; align-items: center;">
        <div class="row">
            <div class="col-md-12">
                <div class="kepala mt-4">
                    <div class="pundak d-flex justify-content-between align-items-center" style="background-color: black">
                        <h5 class="card-title mb-0" style="color:#ffd900">Tambah Karyawan</h5>
                    </div>

                    <div class="lutut">
                        <form action="{{ Route('admin.store_kasir') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Username :</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Masukkan username">
                                </div>
                            </div>
                            <div class="form-group row mt-2">
                                <label for="password" class="col-sm-2 col-form-label">Password :</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="Masukkan password">
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
                                    <select class="form-control" id="role" name="user_type">
                                        <option value="kasir" selected>Kasir</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mt-3" >
                                <div class="col-sm-10 offset-sm-2">
                                    <button type="submit" class="btn"
                                        style="background-color: black; color:#ffd900; font-size:12pt;">Submit</button>
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

        .kepala {
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 700px;
            background-color: #fff;
        }

        .pundak {
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }

        .lutut {
            padding: 15px;
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
