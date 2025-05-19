<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaController
{
    public function index()
    {
        $mahasiswa = DB::table('mahasiswa')
            ->join('kelas', 'mahasiswa.kelas', '=', 'kelas.id')
            ->select('mahasiswa.id', 'mahasiswa.nim', 'mahasiswa.nama', 'kelas.kelas', 'kelas.angkatan')
            ->get();
        return view('modul 8.MhsList', ['mahasiswa' => $mahasiswa]);
    }

    public function tambah()
    {
        $kls = DB::table('kelas')->get();
        //
        return view('modul 8.TambahMahasiswa', compact('kls'));
    }

    public function store(Request $request)
    {
        DB::table('mahasiswa')->insert([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'kelas' => $request->kelas
        ]);

        return redirect('/Mahasiswa');
    }

    // Ganti nama method dan parameter
    public function edit($id)
    {
        $mahasiswa = DB::table('mahasiswa')->where('id', $id)->get();
        $kls = DB::table('kelas')->get();
        return view('modul 8.EditMahasiswa', ['mahasiswa' => $mahasiswa, 'kls' => $kls]);
    }

    // Ganti nama method
    public function update(Request $request)
    {
        DB::table('mahasiswa')->where('id', $request->id)->update([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'kelas' => $request->kelas
        ]);
        return redirect('/Mahasiswa');
    }

    // Ganti nama method dan parameter
    public function destroy($id)
    {
        DB::table('mahasiswa')->where('id', $id)->delete();
        return redirect('/Mahasiswa');
    }
}
