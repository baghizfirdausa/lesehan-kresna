@extends('pemilik/index')

@section('container')

<div class="container">
    <div class="contain">
        <h1>Form Edit Karyawan</h1>
        <form action="/pemilik/karyawan/{{ $karyawan->id }}/update" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="" name="nama" value="{{ $karyawan->nama }}">
            </div>
            <div class="form-group">
                <label for="jabatan">Pekerjaan</label>
                <input type="text" class="form-control" id="" name="jabatan" value="{{ $karyawan->jabatan }}">
            </div>
            <div class="form-group">
                <label for="gaji">Gaji</label>
                <input type="number" class="form-control" id="" name="gaji" value="{{ $karyawan->gaji }}">
            </div>
            <div class="button-container">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="/pemilik/karyawan" class="btn btn-danger">Batalkan</a>
            </div>
        </form>
    </div>
</div>

@endsection