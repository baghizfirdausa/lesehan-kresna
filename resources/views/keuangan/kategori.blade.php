@extends('keuangan/index')

@section('container')

<div class="container">
    <div class="add">
        <a href="/keuangan/kategori/tambah" class="btn btn-primary">  
            Tambah Kategori
        </a>
    </div>
    <div class="contain">
        <h1>Kategori Menu</h1>
        <table class="table table-striped table-bordered data">
            <thead>
                <tr>
                    <th>Nama Kategori</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kategori as $kategori)
                <tr>
                    <td>{{ $kategori->kategori }}</td>
                    <td class="centered">
                        <div>
                            <a href="/keuangan/kategori/{{ $kategori->id }}/edit" class="btn btn-primary">  
                                <img src="https://img.icons8.com/material/96/ffffff/edit--v1.png"/>
                            </a>
                        </div>
                    </td>
                    <td class="centered">
                        <div>
                            <form action="/keuangan/kategori/{{ $kategori->id }}" method="POST" class="">
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
                    <th>Nama Kategori</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

@endsection