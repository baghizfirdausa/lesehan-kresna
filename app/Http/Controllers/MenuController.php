<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\Kategori;

class MenuController extends Controller
{
    public function index()
    {
        $menu = Menu::all();
        return view('keuangan.menu', compact('menu'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('keuangan.tambahMenu', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kategori_id' => 'required',
            'harga' => 'required',
        ]);

        Menu::create([
            'nama' => $request->nama,
            'kategori_id' => $request->kategori_id,
            'harga' => $request->harga,
            'keterangan' => $request->keterangan,
        ]);

        return redirect('/keuangan/menu');
    }

    public function edit($id)
    {
        $menu = Menu::find($id);
        $kategori = Kategori::all();
        return view('keuangan.editMenu', compact('menu', 'kategori'));
    }

    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'nama' => 'required',
            'kategori_id' => 'required',
            'harga' => 'required',
        ]);

        Menu::where('id', $menu->id)
            ->update([
                'nama' => $request->nama,
                'kategori_id' => $request->kategori_id,
                'harga' => $request->harga,
                'keterangan' => $request->keterangan,
            ]);
        return redirect('/keuangan/menu');
    }


    public function destroy(Menu $menu)
    {
        Menu::destroy($menu->id);
        return redirect('keuangan/menu');
    }
}
