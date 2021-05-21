@extends('pemilik/index')

@section('container')

<div class="container">
    <div class="add">
        <a href="/pemilik/karyawan/tambah" class="btn btn-primary">  
            Tambah karyawan
        </a>
    </div>
    <div class="contain">
        <h1>Karyawan</h1>
        <table class="table table-striped table-bordered data">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Pekerjaan</th>
                    <th>Gaji</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($karyawan as $karyawan)
                <tr>
                    <td>{{ $karyawan->nama }}</td>
                    <td>{{ $karyawan->jabatan }}</td>
                    <td>Rp {{ number_format($karyawan->gaji, 0, ",", ".") }}</td>
                    <td class="centered">
                        <div>
                            <a href="/pemilik/karyawan/{{ $karyawan->id }}/edit" class="btn btn-primary">  
                                <img src="https://img.icons8.com/material/96/ffffff/edit--v1.png"/>
                            </a>
                        </div>
                    </td>
                    <td class="centered">
                        <div>
                            <form action="/pemilik/karyawan/{{ $karyawan->id }}" method="POST" class="">
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
                    <th>Pekerjaan</th>
                    <th>Gaji</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

@endsection