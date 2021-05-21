@extends('pemilik/index')

@section('container')

<div class="container">
    <div class="contain">
        <h1>Form Tambah Karyawan</h1>
        <form action="/pemilik/karyawan" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="" name="nama">
            </div>
            <div class="form-group">
                <label for="jabatan">Pekerjaan</label>
                <input type="text" class="form-control" id="" name="jabatan">
            </div>
            <div class="form-group">
                <label for="gaji">Gaji</label>
                <input type="number" class="form-control" id="" name="gaji">
            </div>
            <div class="button-container">
                <button type="submit" class="btn btn-primary">Tambah Karyawan</button>
                <a href="/pemilik/karyawan" class="btn btn-danger">Batalkan</a>
            </div>
        </form>
    </div>
</div>

@endsection