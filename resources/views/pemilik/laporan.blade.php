@extends('keuangan/index')

@section('container')

<div class="container">
    <div class="contain">
        <h1>Catatan Keuangan Lesehan & Kolam Pancing Kresna</h1>
        <form action="/laporan/filter" method="POST">
            @csrf
            <h3>Filter</h3>
            <div class="form-group">
                <label for="bulan">Bulan Laporan</label>
                <br>
                <select name="bulan" id="bulan" class="form-select">
                    <option value="1">Januari</option>
                    <option value="2">Februari</option>
                    <option value="3">Maret</option>
                    <option value="4">April</option>
                    <option value="5">Mei</option>
                    <option value="6">Juni</option>
                    <option value="7">Juli</option>
                    <option value="8">Agustus</option>
                    <option value="9">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                  </select>
            </div>
            <div class="buttons">
                <button type="submit" name="aksi" value="lihat" class="btn btn-primary col-md-5">Filter</button>
                <button type="submit" name="aksi" value="cetak" class="btn btn-success col-md-5">Cetak</button>
            </div>
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
                </tr>
            </tfoot>
        </table>
    </div>
</div>

@endsection