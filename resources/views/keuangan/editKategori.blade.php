@extends('keuangan/index')

@section('container')

<div class="container">
    <div class="contain">
        <h1>Form Edit Kategori</h1>
        <form action="/keuangan/kategori/{{ $kategori->id }}/update" method="POST">
            @csrf
            <div class="form-group">
                <label for="kategori">Nama Kategori</label>
                <input type="text" class="form-control" id="" name="kategori" value="{{ $kategori->kategori }}">
            </div>
            <div class="button-container">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="/keuangan/kategori" class="btn btn-danger">Batalkan</a>
            </div>
        </form>
    </div>
</div>

@endsection