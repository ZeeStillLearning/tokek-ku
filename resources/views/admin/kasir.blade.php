@extends('layouts.kasir')

@section('layout')
    <div class="container" style="display: flex; justify-content: center; align-items: center;">
        <div class="row">
            <div class="col-md-12">
                <br>
                @if (session('success'))
                    <div id="successMessage" class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    <script>
                        setTimeout(function() {
                            document.getElementById('successMessage').style.display = 'none';
                        }, 2000);
                    </script>
                @endif


                <div class="card mt-4">
                    <div class="card-header d-flex justify-content-between align-items-center"
                        style="background-color: black">
                        <h5 class="card-title mb-0" style="color: #ffd900">Daftar Petugas Kasir</h5>
                        <a href="{{ Route('admin.create_kasir') }}" class="card-title mb-0 btn btn-warning">Tambah Petugas
                            Kasir</a>
                    </div>

                    <div class="card-body">
                        <table class="table" >
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kasir</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $counter = ($kasir->currentPage() - 1) * $kasir->perPage() + 1; @endphp
                                @foreach ($kasir as $kas)
                                    @if ($kas->IsDelete == 0)
                                        <tr>
                                            <td>{{ $counter++ }}</td>
                                            <td>{{ $kas->name }}</td>
                                            <td>
                                                <a href="{{ route('admin.edit_kasir', $kas->id) }}"
                                                    class="btn btn-warning">Edit</a>
                                                <a href="{{ Route('admin.destroy_kasir', $kas->id) }}"
                                                    class="btn btn-danger">Hapus</a>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>

                        </table>
                        {{ $kasir->links() }}

                    </div>
                </div>

            </div>
        </div>
    </div>
    <style>
        .card {
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 800px;
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
    <script>
        @if (session()->has('gagal'))
            alert('{{ session()->get('gagal') }}');
        @endif
    </script>
@endsection
