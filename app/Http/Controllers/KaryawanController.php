<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Karyawan;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawan = Karyawan::all();
        return view('pemilik.karyawan', compact('karyawan'));
    }

    public function create()
    {
        return view('pemilik.tambahKaryawan');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'gaji' => 'required',
        ]);

        Karyawan::create([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'gaji' => $request->gaji,
        ]);

        return redirect('/pemilik/karyawan');
    }

    public function edit($id)
    {
        $karyawan = Karyawan::find($id);
        return view('pemilik.editKaryawan', compact('karyawan'));
    }

    public function update(Request $request, Karyawan $karyawan)
    {
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'gaji' => 'required',
        ]);

        Karyawan::where('id', $karyawan->id)
            ->update([
                'nama' => $request->nama,
                'jabatan' => $request->jabatan,
                'gaji' => $request->gaji,
            ]);
        return redirect('/pemilik/karyawan');
    }


    public function destroy(Karyawan $karyawan)
    {
        Karyawan::destroy($karyawan->id);
        return redirect('/pemilik/karyawan');
    }
}
