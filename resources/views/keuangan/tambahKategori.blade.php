@extends('keuangan/index')

@section('container')

<div class="container">
    <div class="contain">
        <h1>Form Tambah Kategori</h1>
        <form action="/keuangan/kategori" method="POST">
            @csrf
            <div class="form-group">
                <label for="kategori">Nama Kategori</label>
                <input type="text" class="form-control" id="" name="kategori">
            </div>
            <div class="button-container">
                <button type="submit" class="btn btn-primary">Tambah Kategori</button>
                <a href="/keuangan/kategori" class="btn btn-danger">Batalkan</a>
            </div>
        </form>
    </div>
</div>

@endsection