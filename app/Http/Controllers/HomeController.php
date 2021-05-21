<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Karyawan;
use App\Transaksi;

class HomeController extends Controller
{
    public function index()
    {
        date_default_timezone_set('Asia/Jakarta');
        $now = now();

        $tot_pemasukan_harian = number_format((Transaksi::where('jenis_transaksi', 'pemasukan')
            ->whereYear('created_at', $now->year)
            ->whereMonth('created_at', $now->month)
            ->whereDay('created_at', $now->day)
            ->sum('total')), 0, ",", ".");

        $tot_pemasukan_bulanan = number_format((Transaksi::where('jenis_transaksi', 'pemasukan')
            ->whereYear('created_at', $now->year)
            ->whereMonth('created_at', $now->month)
            ->sum('total')), 0, ",", ".");

        $tot_pemasukan_tahunan = number_format((Transaksi::where('jenis_transaksi', 'pemasukan')
            ->whereYear('created_at', $now->year)
            ->sum('total')), 0, ",", ".");

        $tot_pemasukan = number_format((Transaksi::where('jenis_transaksi', 'pemasukan')
            ->sum('total')), 0, ",", ".");

        $tot_pengeluaran_tahunan = number_format(Transaksi::where('jenis_transaksi', 'pengeluaran')
            ->whereYear('created_at', $now->year)
            ->whereMonth('created_at', $now->month)
            ->whereDay('created_at', $now->day)
            ->sum('total'), 0, ",", ".");

        $tot_pengeluaran_bulanan = number_format(Transaksi::where('jenis_transaksi', 'pengeluaran')
            ->whereYear('created_at', $now->year)
            ->whereMonth('created_at', $now->month)
            ->sum('total'), 0, ",", ".");

        $tot_pengeluaran_harian = number_format(Transaksi::where('jenis_transaksi', 'pengeluaran')
            ->whereYear('created_at', $now->year)
            ->sum('total'), 0, ",", ".");

        $tot_pengeluaran = number_format(Transaksi::where('jenis_transaksi', 'pengeluaran')
            ->sum('total'), 0, ",", ".");

        $sisa_uang = number_format((Transaksi::where('jenis_transaksi', 'pemasukan')->sum('total') - Transaksi::where('jenis_transaksi', 'pengeluaran')->sum('total')), 0, ",", ".");

        $tot_karyawan = Karyawan::count();

        if (auth()->user()->role == 'pemilik') {
            return view('pemilik.dashboard', compact(
                'tot_pemasukan',
                'tot_pemasukan_tahunan',
                'tot_pemasukan_bulanan',
                'tot_pemasukan_harian',
                'tot_pengeluaran',
                'tot_pengeluaran_tahunan',
                'tot_pengeluaran_bulanan',
                'tot_pengeluaran_harian',
                'sisa_uang',
                'tot_karyawan',
                'now'
            ));
        } else if (auth()->user()->role == 'keuangan') {
            return view('keuangan.dashboard', compact(
                'tot_pemasukan',
                'tot_pemasukan_tahunan',
                'tot_pemasukan_bulanan',
                'tot_pemasukan_harian',
                'tot_pengeluaran',
                'tot_pengeluaran_tahunan',
                'tot_pengeluaran_bulanan',
                'tot_pengeluaran_harian',
                'sisa_uang',
                'tot_karyawan',
                'now'
            ));
        }
    }
}
