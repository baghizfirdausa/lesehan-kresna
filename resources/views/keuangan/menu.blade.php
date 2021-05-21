@extends('keuangan/index')

@section('container')

<div class="container">
    <div class="add">
        <a href="/keuangan/menu/tambah" class="btn btn-primary">  
            Tambah Menu
        </a>
        <a href="/keuangan/kategori" class="btn btn-warning">  
            Kategori Menu
        </a>
    </div>
    <div class="contain">
        <h1>Menu</h1>
        <table class="table table-striped table-bordered data">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Keterangan</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($menu as $menu)
                <tr>
                    <td>{{ $menu->nama }}</td>
                    <td>{{ $menu->kategori->kategori }}</td>
                    <td>Rp {{ number_format($menu->harga, 0, ",", ".") }}</td>
                    <td>{{ $menu->keterangan }}</td>
                    <td class="centered">
                        <div>
                            <a href="/keuangan/menu/{{ $menu->id }}/edit" class="btn btn-primary">  
                                <img src="https://img.icons8.com/material/96/ffffff/edit--v1.png"/>
                            </a>
                        </div>
                    </td>
                    <td class="centered">
                        <div>
                            <form action="/keuangan/menu/{{ $menu->id }}" method="POST" class="">
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
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Keterangan</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

@endsection