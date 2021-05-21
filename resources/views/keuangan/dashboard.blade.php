@extends('keuangan/index')

@section('container')

<div class="dashboard">
    <div class="info">
        <div class="card left-border bg">
            <p class="label fg">PENDAPATAN</p>
            <p class="value">Rp {{ $tot_pemasukan }}</p>
        </div>
        <div class="card left-border br">
            <p class="label fr">PENGELUARAN</p>
            <p class="value">Rp {{ $tot_pengeluaran }}</p>
        </div>
        <div class="card left-border bb">
            <p class="label fb">SISA UANG</p>
            <p class="value">Rp {{ $sisa_uang }}</p>
        </div>
        <div class="card left-border by">
            <p class="label fy">KARYAWAN</p>
            <p class="value">{{ $tot_karyawan }}</p>
        </div>
    </div>
</div>

@endsection