@extends('layouts.kasir')

@section('layout')
    <div class="container" style="display: flex; justify-content: center; align-items: center;">
        <div class="row">
            <div class="col-md-8">
                @if (session('error'))
                    <div id="errorAlert" class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <script>
                    setTimeout(function() {
                        var errorAlert = document.getElementById('errorAlert');
                        if (errorAlert) {
                            errorAlert.style.display = 'none';
                        }
                    }, 2000);
                </script>

                <div class="card mt-4" style="border:3px solid black;">
                    <div class="card-header"
                        style="display: flex; justify-content: center; align-items: center; background:black;">
                        <h5 class="card-title mb-0" style="color: #ffd900">Form Tambah Transaksi</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ Route('kasir.store') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="nama_pelanggan" class="col-sm-3 col-form-label">Nama Pelanggan :</label>
                                <div class="col-sm-9">
                                    <input type="text" name="nama_pelanggan" class="form-control" required>
                                </div>

                            </div>
                            <div class="form-group mt-2">
                                <label for="produk_id">
                                    Pilih Produk :
                                </label>
                                <select name="produk_id[]" id="produk_id" class="form-control mt-2" multiple required>
                                    @foreach ($produks as $produk)
                                        <option value="{{ $produk->id }}" data-harga="{{ $produk->harga }}">
                                            {{ $produk->nama_produk }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mt-2">
                                <label for="produk_details">Detail Produk:</label>
                                <div id="produk-details"></div>
                            </div>
                            <div class="form-group">
                                <label for="total_harga">Total Harga :</label>
                                <input type="text" name="total_harga" id="total_harga" class="form-control"
                                    style="width: 500px" readonly>
                            </div>
                            <button type="submit" class="btn btn-warning mt-2"
                                style="border: 2px solid black; font-weight:bold">Checkout</button>
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

        .produk-item {
            border-bottom: 1px solid #ccc;
            padding-bottom: 10px;
            margin-bottom: 10px;
        }

        .produk-item label {
            font-weight: bold;
        }

        .produk-item input {
            width: 100px;
        }

        .card {
            width: 900px;
            border-radius: 3%;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const produkSelect = document.getElementById('produk_id');
            const produkDetails = document.getElementById('produk-details');
            const totalHargaInput = document.getElementById('total_harga');

            function toggleCardSelection(card) {
                card.classList.toggle('selected');
            }

            function toggleOptionSelection(option) {
                option.selected = !option.selected;
            }

            const produkCards = document.querySelectorAll('.card.produk-item');
            produkCards.forEach(function(card) {
                card.addEventListener('click', function() {
                    toggleCardSelection(card);
                    const index = parseInt(card.getAttribute('data-index'));
                    const option = produkSelect.options[index];
                    toggleOptionSelection(option);
                });
            });

            produkSelect.addEventListener('change', function() {
                let selectedOptions = produkSelect.selectedOptions;
                produkDetails.innerHTML = '';
                let totalHarga = 0;

                for (let option of selectedOptions) {
                    let hargaAwal = parseFloat(option.getAttribute('data-harga'));

                    let produkItem = document.createElement('div');
                    produkItem.classList.add('card', 'produk-item');
                    produkItem.setAttribute('data-index', option.index);
                    produkItem.style.width = '300px';

                    let cardBody = document.createElement('div');
                    cardBody.classList.add('card-body');

                    let label = document.createElement('h5');
                    label.classList.add('card-title');
                    label.textContent = option.text;

                    let hargaText = document.createElement('p');
                    hargaText.classList.add('card-text');
                    hargaText.textContent = 'Harga: Rp. ' + hargaAwal.toFixed(2);

                    let jumlahProdukInput = document.createElement('input');
                    jumlahProdukInput.setAttribute('type', 'number');
                    jumlahProdukInput.setAttribute('name', 'jumlah_produk[]');
                    jumlahProdukInput.setAttribute('class', 'form-control');
                    jumlahProdukInput.setAttribute('placeholder', 'Jumlah Produk');
                    jumlahProdukInput.setAttribute('min', '1');

                    let subTotalInput = document.createElement('input');
                    subTotalInput.setAttribute('type', 'text');
                    subTotalInput.setAttribute('name', 'sub_total[]');
                    subTotalInput.setAttribute('class', 'form-control');
                    subTotalInput.setAttribute('readonly', 'readonly');

                    jumlahProdukInput.addEventListener('input', function() {
                        let jumlahProduk = parseFloat(jumlahProdukInput.value);
                        if (jumlahProduk < 1) {
                            jumlahProdukInput.value = 1;
                            jumlahProduk = 1;
                        }
                        let subTotal = hargaAwal * jumlahProduk;
                        subTotalInput.value = subTotal.toFixed(2);

                        totalHarga = 0;
                        document.querySelectorAll('[name="sub_total[]"]').forEach(input => {
                            totalHarga += parseFloat(input.value);
                        });
                        totalHargaInput.value = totalHarga.toFixed(2);
                    });

                    cardBody.appendChild(label);
                    cardBody.appendChild(hargaText);
                    cardBody.appendChild(jumlahProdukInput);
                    cardBody.appendChild(subTotalInput);
                    produkItem.appendChild(cardBody);
                    produkDetails.appendChild(produkItem);
                }
            });

            const checkoutButton = document.querySelector('form button[type="submit"]');
            checkoutButton.addEventListener('click', function(event) {
                const jumlahProdukInputs = document.querySelectorAll('[name="jumlah_produk[]"]');
                let isInvalid = false;
                jumlahProdukInputs.forEach(function(input) {
                    if (parseFloat(input.value) === 0) {
                        isInvalid = true;
                    }
                });
                if (isInvalid) {
                    event.preventDefault();
                    alert('Jumlah produk tidak boleh 0');
                }
            });
        });
    </script>
@endsection
