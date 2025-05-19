<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelasController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kls = DB::table('kelas')->get();
        return view('modul 7.index2', ['kelas' => $kls]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('modul 7.KelasAdd');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('kelas')->insert([
            'kelas' => $request->kelas,
            'angkatan' => $request->angkatan
        ]);
        return redirect('/Kelas');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kelas = DB::table('kelas')->where('id', $id)->get();
        return view('modul 7.KelasEdit', ['dt' => $kelas]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        DB::table('kelas')->where('id', $request->id)->update([
            'kelas' => $request->kelas,
            'angkatan' => $request->angkatan
        ]);
        return redirect('/Kelas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('kelas')->where('id', $id)->delete();
        return redirect('/Kelas');
    }
}
