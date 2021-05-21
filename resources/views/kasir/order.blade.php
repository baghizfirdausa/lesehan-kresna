@extends('kasir/index')

@section('container')

<div class="container">
    <div class="contain">
        <h1>Form Tambah Order</h1>
        <form action="/kasir/order" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama_pelaku">Nama Pelanggan</label>
                <input type="text" class="form-control" id="" name="nama_pelaku">
            </div>
            <div class="form-group">
                <label for="total">Total</label>
                <input type="number" class="form-control" id="" name="total">
            </div>
            <div class="button-container">
                <button type="submit" class="btn btn-primary">Tambah Data</button>
                <a href="/kasir/dashboard" class="btn btn-danger">Batalkan</a>
            </div>
            <input type="hidden" value="Penjualan" name="kategori_transaksi">
            <input type="hidden" value="Pemasukan Restoran" name="nama_transaksi">
            <input type="hidden" value="Pemasukan" name="jenis_transaksi">
        </form>
    </div>
</div>

@endsection