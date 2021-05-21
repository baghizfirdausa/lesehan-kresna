@extends('keuangan/index')

@section('container')

<div class="container">
    <div class="add">
        <a href="/keuangan/transaksi/tambah" class="btn btn-primary">  
            Tambah Transaksi
        </a>
    </div>
    <div class="contain">
        <h1>Transaksi</h1>
        <form action="/keuangan/transaksi/filter" method="POST">
            @csrf
            <h3>Filter</h3>
            <div class="form-group">
                <label for="tanggal_awal">Tanggal Awal</label>
                <input type="date" class="form-control" id="" name="tanggal_awal">
            </div>
            <div class="form-group">
                <label for="tanggal_akhir">Tanggal Akhir</label>
                <input type="date" class="form-control" id="" name="tanggal_akhir">
            </div>
            <button type="submit" class="btn btn-primary">Filter</button>
            <a href="/keuangan/transaksi" class="btn btn-danger">Hapus Filter</a>
        </form>
        <table class="table table-striped table-bordered data">
            <thead>
                <tr>
                    <th>Nama Transaksi</th>
                    <th>Nama Pelaku Transaksi</th>
                    <th>Jenis Transaksi</th>
                    <th>Kategori Transaksi</th>
                    <th>Jumlah Transaksi</th>
                    <th>Tanggal</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksi as $transaksi)
                <tr>
                    <td>{{ $transaksi->nama_transaksi }}</td>
                    <td>{{ $transaksi->nama_pelaku }}</td>
                    <td>{{ $transaksi->jenis_transaksi }}</td>
                    <td>{{ $transaksi->kategori_transaksi }}</td>
                    <td>{{ $transaksi->created_at->format('Y-m-d') }}</td>
                    <td>Rp {{ number_format($transaksi->total, 0, ",", ".") }}</td>
                    <td class="centered">
                        <div>
                            <form action="/keuangan/transaksi/{{ $transaksi->id }}" method="POST" class="">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger">
                                    <img src="https://img.icons8.com/ios-filled/100/ffffff/delete-sign--v1.png"/>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Nama Transaksi</th>
                    <th>Nama Pelaku Transaksi</th>
                    <th>Jenis Transaksi</th>
                    <th>Kategori Transaksi</th>
                    <th>Jumlah Transaksi</th>
                    <th>Tanggal</th>
                    <th>Delete</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

@endsection