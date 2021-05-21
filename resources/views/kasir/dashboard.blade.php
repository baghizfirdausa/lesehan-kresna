@extends('kasir/index')

@section('container')

<div class="container">
    <div class="add">
        <a href="/kasir/order" class="btn btn-primary">  
            Tambah Order
        </a>
    </div>
    <div class="contain">
        <h1>Order</h1>
        <table class="table table-striped table-bordered data">
            <thead>
                <tr>
                    <th>Nama Pembeli</th>
                    <th>Total</th>
                    <th>Tanggal Transaksi</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksi as $transaksi)
                <tr>
                    <td>{{ $transaksi->nama_pelaku }}</td>
                    <td>Rp {{ number_format($transaksi->total, 0, ",", ".") }}</td>
                    <td>{{ $transaksi->created_at->format('Y-m-d') }}</td>
                    <td class="centered">
                        <div>
                            <form action="/kasir/order/{{ $transaksi->id }}" method="POST" class="">
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
                    <th>Nama Pembeli</th>
                    <th>Total</th>
                    <th>Tanggal Transaksi</th>
                    <th>Delete</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

@endsection