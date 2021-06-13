<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;

class LaporanController extends Controller
{
    public function __invoke()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tahun = now()->year;
        switch (request()->input('bulan')) {
            case 1:
                $bulan = 'Januari';
                $bulan_sebelum = 'Desember';
                $bn = 1;
                $bsn = 12;
                $tahun -= 1;
                break;
            case 2:
                $bulan = 'Februari';
                $bulan_sebelum = 'Januari';
                $bn = 2;
                $bsn = 1;
                break;
            case 3:
                $bulan = 'Maret';
                $bulan_sebelum = 'Februari';
                $bn = 3;
                $bsn = 2;
                break;
            case 4:
                $bulan = 'April';
                $bulan_sebelum = 'Maret';
                $bn = 4;
                $bsn = 3;
                break;
            case 5:
                $bulan = 'Mei';
                $bulan_sebelum = 'April';
                $bn = 5;
                $bsn = 4;
                break;
            case 6:
                $bulan = 'Juni';
                $bulan_sebelum = 'Mei';
                $bn = 6;
                $bsn = 5;
                break;
            case 7:
                $bulan = 'Juli';
                $bulan_sebelum = 'Juni';
                $bn = 7;
                $bsn = 6;
                break;
            case 8:
                $bulan = 'Agustus';
                $bulan_sebelum = 'Juli';
                $bn = 8;
                $bsn = 7;
                break;
            case 9:
                $bulan = 'September';
                $bulan_sebelum = 'Agustus';
                $bn = 9;
                $bsn = 8;
                break;
            case 10:
                $bulan = 'Oktober';
                $bulan_sebelum = 'September';
                $bn = 10;
                $bsn = 9;
                break;
            case 11:
                $bulan = 'November';
                $bulan_sebelum = 'Oktober';
                $bn = 11;
                $bsn = 10;
                break;
            case 12:
                $bulan = 'Desember';
                $bulan_sebelum = 'November';
                $bn = 12;
                $bsn = 11;
                break;
            default:
                $bulan = 'Februari';
                $bulan_sebelum = 'Januari';
                $bn = 5;
                $bsn = 5;
                break;
        }
        $pub = number_format((Transaksi::where('kategori_transaksi', 'Penjualan')
            ->whereYear('created_at', now()->year)
            ->whereMonth('created_at', $bn)
            ->sum('total')), 0, ",", ".");

        $pubs = number_format((Transaksi::where('kategori_transaksi', 'Penjualan')
            ->whereYear('created_at', $tahun)
            ->whereMonth('created_at', $bsn)
            ->sum('total')), 0, ",", ".");

        $plb = number_format((Transaksi::where('kategori_transaksi', 'not like', 'Penjualan')
            ->where('jenis_transaksi', 'Pemasukan')
            ->whereYear('created_at', now()->year)
            ->whereMonth('created_at', $bn)
            ->sum('total')), 0, ",", ".");

        $plbs = number_format((Transaksi::where('kategori_transaksi', 'not like', 'Penjualan')
            ->where('jenis_transaksi', 'Pemasukan')
            ->whereYear('created_at', $tahun)
            ->whereMonth('created_at', $bsn)
            ->sum('total')), 0, ",", ".");

        $bub = number_format((Transaksi::where('kategori_transaksi', 'not like', 'Lainnya')
            ->where('jenis_transaksi', 'Pengeluaran')
            ->whereYear('created_at', now()->year)
            ->whereMonth('created_at', $bn)
            ->sum('total')), 0, ",", ".");

        $bubs = number_format((Transaksi::where('kategori_transaksi', 'not like', 'Lainnya')
            ->where('jenis_transaksi', 'Pengeluaran')
            ->whereYear('created_at', $tahun)
            ->whereMonth('created_at', $bsn)
            ->sum('total')), 0, ",", ".");

        $blb = number_format((Transaksi::where('kategori_transaksi', 'Lainnya')
            ->where('jenis_transaksi', 'Pengeluaran')
            ->whereYear('created_at', now()->year)
            ->whereMonth('created_at', $bn)
            ->sum('total')), 0, ",", ".");

        $blbs = number_format((Transaksi::where('kategori_transaksi', 'Lainnya')
            ->where('jenis_transaksi', 'Pengeluaran')
            ->whereYear('created_at', $tahun)
            ->whereMonth('created_at', $bsn)
            ->sum('total')), 0, ",", ".");

        $pendapatan_bulan = (Transaksi::where('jenis_transaksi', 'Pemasukan')
            ->whereYear('created_at', now()->year)
            ->whereMonth('created_at', $bn)
            ->sum('total'));

        $pendapatan_bulan_sebelum = (Transaksi::where('jenis_transaksi', 'Pemasukan')
            ->whereYear('created_at', $tahun)
            ->whereMonth('created_at', $bsn)
            ->sum('total'));

        $beban_bulan = (Transaksi::where('jenis_transaksi', 'Pengeluaran')
            ->whereYear('created_at', now()->year)
            ->whereMonth('created_at', $bn)
            ->sum('total'));

        $beban_bulan_sebelum = (Transaksi::where('jenis_transaksi', 'Pengeluaran')
            ->whereYear('created_at', $tahun)
            ->whereMonth('created_at', $bsn)
            ->sum('total'));

        $tpb = number_format($pendapatan_bulan, 0, ",", ".");
        $tpbs = number_format($pendapatan_bulan_sebelum, 0, ",", ".");
        $tbb = number_format($beban_bulan, 0, ",", ".");
        $tbbs = number_format($beban_bulan_sebelum, 0, ",", ".");

        $laba_bulan = $pendapatan_bulan - $beban_bulan;
        $laba_bulan_sebelum = $pendapatan_bulan_sebelum - $beban_bulan_sebelum;
        $lsbb = number_format($laba_bulan, 0, ",", ".");
        $lsbbs = number_format($laba_bulan_sebelum, 0, ",", ".");

        $pajak_bulan = 0.1 * $pendapatan_bulan;
        $pajak_bulan_sebelum = 0.1 * $pendapatan_bulan_sebelum;
        $pb = number_format($pajak_bulan, 0, ",", ".");
        $pbs = number_format($pajak_bulan_sebelum, 0, ",", ".");

        $laba_sesudah = $laba_bulan - $pajak_bulan;
        $laba_sesudah_sebelum = $laba_bulan_sebelum - $pajak_bulan_sebelum;
        $lstb = number_format($laba_sesudah, 0, ",", ".");
        $lstbs = number_format($laba_sesudah_sebelum, 0, ",", ".");

        $transaksi = Transaksi::whereMonth('created_at', '=',  $bn)->get();
        switch (request()->input('aksi')) {
            case 'lihat':
                if (auth()->user()->role == 'pemilik') {
                    return view('pemilik.laporan', compact('transaksi'));
                } else if (auth()->user()->role == 'keuangan') {
                    return view('keuangan.laporan', compact('transaksi'));
                }
                break;
            case 'cetak':
                if (auth()->user()->role == 'pemilik') {
                    return view('pemilik.cetak', compact('bulan', 'bulan_sebelum', 'pubs', 'pub', 'plbs', 'plb', 'tpbs', 'tpb', 'bubs', 'bub', 'blbs', 'blb', 'tbbs', 'tbb', 'lsbbs', 'lsbb', 'pbs', 'pb', 'lstbs', 'lstb'));
                } else if (auth()->user()->role == 'keuangan') {
                    return view('keuangan.cetak', compact('bulan', 'bulan_sebelum', 'pubs', 'pub', 'plbs', 'plb', 'tpbs', 'tpb', 'bubs', 'bub', 'blbs', 'blb', 'tbbs', 'tbb', 'lsbbs', 'lsbb', 'pbs', 'pb', 'lstbs', 'lstb'));
                }
                break;
            default:
                if (auth()->user()->role == 'pemilik') {
                    return view('pemilik.laporan', compact('transaksi'));
                } else if (auth()->user()->role == 'keuangan') {
                    return view('keuangan.laporan', compact('transaksi'));
                }
                break;
        }
    }
}
