@extends('pemilik/index')

@section('container')

<div class="dashboard">
    <div class="info">
        <div class="card left-border bg">
            <p class="label">Pendapatan Hari Ini</p>
            <p class="value">Rp {{ $tot_pemasukan_harian }}</p>
        </div>
        <div class="card left-border bg">
            <p class="label">Pendapatan Bulan {{ $now->format('F')}}</p>
            <p class="value">Rp {{ $tot_pemasukan_bulanan }}</p>
        </div>
        <div class="card left-border bg">
            <p class="label">Pendapatan Tahun {{ $now->format('Y')}}</p>
            <p class="value">{{ $tot_pemasukan_tahunan }}</p>
        </div>
        <div class="card left-border bg">
            <p class="label">Pendapatan Total</p>
            <p class="value">{{ $tot_pemasukan }}</p>
        </div>
    </div>
    <div class="info next">
        <div class="card left-border br">
            <p class="label">Pengeluaran Hari Ini</p>
            <p class="value">Rp {{ $tot_pengeluaran_harian }}</p>
        </div>
        <div class="card left-border br">
            <p class="label">Pengeluaran Bulan {{ $now->format('F')}}</p>
            <p class="value">Rp {{ $tot_pengeluaran_bulanan }}</p>
        </div>
        <div class="card left-border br">
            <p class="label">Pengeluaran Tahun {{ $now->format('Y')}}</p>
            <p class="value">{{ $tot_pengeluaran_tahunan }}</p>
        </div>
        <div class="card left-border br">
            <p class="label">Pengeluaran Total</p>
            <p class="value">{{ $tot_pengeluaran }}</p>
        </div>
    </div>
    <div class="info next">
        <div class="card left-border bb">
            <p class="label fb">Saldo Saat Ini</p>
            <p class="value">Rp {{ $sisa_uang }}</p>
        </div>
        <div class="card left-border by">
            <p class="label fy">Total Karyawan</p>
            <p class="value">Rp {{ $tot_karyawan }}</p>
        </div>
    </div>
</div>

@endsection