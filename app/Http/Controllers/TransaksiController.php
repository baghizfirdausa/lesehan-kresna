<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;

class TransaksiController extends Controller
{
    public function index()
    {
        if (auth()->user()->role == 'keuangan') {
            $transaksi = Transaksi::all();
            return view('keuangan.transaksi', compact('transaksi'));
        } else if (auth()->user()->role == 'kasir') {
            $transaksi = Transaksi::where('kategori_transaksi', 'Penjualan')->get();
            return view('kasir.dashboard', compact('transaksi'));
        }
    }

    public function filterIndex(Request $request)
    {
        $awal = $request->tanggal_awal;
        $akhir = $request->tanggal_akhir;
        $transaksi = Transaksi::whereBetween('created_at', [$awal, $akhir])->get();
        return view('keuangan.transaksi', compact('transaksi'));
    }

    public function create()
    {
        if (auth()->user()->role == 'keuangan') {
            return view('keuangan.tambahTransaksi');
        } else if (auth()->user()->role == 'kasir') {
            return view('kasir.order');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pelaku' => 'required',
            'nama_transaksi' => 'required',
            'jenis_transaksi' => 'required',
            'total' => 'required',
        ]);

        Transaksi::create([
            'nama_pelaku' => $request->nama_pelaku,
            'nama_transaksi' => $request->nama_transaksi,
            'jenis_transaksi' => $request->jenis_transaksi,
            'kategori_transaksi' => $request->kategori_transaksi,
            'total' => $request->total,
        ]);

        if (auth()->user()->role == 'keuangan') {
            return redirect('/keuangan/transaksi');
        } else if (auth()->user()->role == 'kasir') {
            return redirect('/kasir/dashboard');
        }
    }

    public function destroy(Transaksi $transaksi)
    {
        Transaksi::destroy($transaksi->id);
        if (auth()->user()->role == 'keuangan') {
            return redirect('/keuangan/transaksi');
        } else if (auth()->user()->role == 'kasir') {
            return redirect('/kasir/dashboard');
        }
    }
}
