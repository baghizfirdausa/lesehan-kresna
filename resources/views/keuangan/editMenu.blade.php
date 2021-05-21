@extends('keuangan/index')

@section('container')

<div class="container">
    <div class="contain">
        <h1>Form Edit Menu</h1>
        <form action="/keuangan/menu/{{ $menu->id }}/update" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama">Nama Menu</label>
                <input type="text" class="form-control" id="" name="nama" value="{{ $menu->nama }}">
            </div>
            <div class="form-group">
                <label for="kategori_id">Kategori</label>
                <select id="" name="kategori_id" class="form-control">
                    @foreach($kategori as $kategori)
                    <option value='{{$kategori->id}}' {{ old('kategori_id', $kategori->id) == $kategori->id ? 'selected' : '' }}>{{$kategori->kategori}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="number" class="form-control" id="" name="harga" value="{{ $menu->harga }}">
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <input type="text" class="form-control" id="" name="keterangan" value="{{ $menu->keterangan }}">
            </div>
            <div class="button-container">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="/keuangan/menu" class="btn btn-danger">Batalkan</a>
            </div>
        </form>
    </div>
</div>

@endsection