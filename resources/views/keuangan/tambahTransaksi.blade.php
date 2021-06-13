@extends('keuangan/index')

@section('container')

<div class="container">
    <div class="contain">
        <h1>Form Tambah Transaksi</h1>
        <form action="/keuangan/transaksi" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama_transaksi">Nama Transaksi</label>
                <input type="text" class="form-control" id="" name="nama_transaksi">
            </div>
            <div class="form-group">
                <label for="nama_pelaku">Nama Pelaku Transaksi</label>
                <input type="text" class="form-control" id="" name="nama_pelaku">
            </div>
            <div class="form-group">
                <label for="jenis_transaksi">Jenis Transaksi</label>
                <br>
                <select name="jenis_transaksi" class="form-select" aria-label="Default select example">
                    <option value="Pemasukan">Pemasukan</option>
                    <option value="Pengeluaran">Pengeluaran</option>
                </select>
            </div>
            <div class="form-group">
                <label for="kategori_transaksi">Kategori Transaksi</label>
                <br>
                <select name="jenis_transaksi" class="form-select" aria-label="Default select example">
                    <option value="Usaha">Usaha</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
            </div>
            <div class="form-group">
                <label for="total">Jumlah Transaksi</label>
                <input type="number" class="form-control" id="" name="total">
            </div>
            <div class="button-container">
                <button type="submit" class="btn btn-primary">Tambah Transaksi</button>
                <a href="/keuangan/transaksi" class="btn btn-danger">Batalkan</a>
            </div>
        </form>
    </div>
</div>

@endsection