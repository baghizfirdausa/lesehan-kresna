<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        return view('keuangan.kategori', compact('kategori'));
    }

    public function create()
    {
        return view('keuangan.tambahKategori');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required',
        ]);

        Kategori::create([
            'kategori' => $request->kategori,
        ]);

        return redirect('/keuangan/kategori');
    }

    public function edit($id)
    {
        $kategori = Kategori::find($id);
        return view('keuangan.editKategori', compact('kategori'));
    }

    public function update(Request $request, Kategori $kategori)
    {
        $request->validate([
            'kategori' => 'required',
        ]);

        Kategori::where('id', $kategori->id)
            ->update([
                'kategori' => $request->kategori,
            ]);
        return redirect('/keuangan/kategori');
    }


    public function destroy(Kategori $kategori)
    {
        Kategori::destroy($kategori->id);
        return redirect('/keuangan/kategori');
    }
}
