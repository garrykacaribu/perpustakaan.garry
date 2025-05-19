<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Buku;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use PDF; // Barryvdh\DomPDF\Facade

class PeminjamanController extends Controller
{
    /**
     * Display a listing of peminjaman.
     * (dipanggil oleh route yang menyebut 'peminjaman')
     */
 public function peminjaman()
{
    if (! Session::has('user')) {
        return redirect('/login');
    }

    $peminjaman = Peminjaman::with(['buku', 'anggota'])
                    ->where('status', 'pinjam')
                    ->get();

    $buku = Buku::all();
    $anggota = \App\Models\Anggota::all(); // Tambahkan ini

    return view('buku.peminjaman', compact('peminjaman', 'buku', 'anggota'));
}



    /**
     * Store a newly created peminjaman in storage.
     */
   public function store(Request $request)
{
    $request->validate([
        'buku_id'          => 'required|exists:buku,id',
        'anggota_id'       => 'required|exists:anggotas,id', // tambahkan validasi anggota
        'tanggal_pinjam'   => 'required|date',
        'tanggal_kembali'  => 'required|date|after:tanggal_pinjam',
    ]);

    DB::table('peminjaman')->insert([
        'buku_id'         => $request->buku_id,
        'anggota_id'      => $request->anggota_id, // tambahkan ini
        'tanggal_pinjam'  => $request->tanggal_pinjam,
        'tanggal_kembali' => $request->tanggal_kembali,
        'status'          => 'pinjam',
        'created_at'      => now(),
        'updated_at'      => now(),
    ]);

    return redirect('/peminjaman')
           ->with('success', 'Data peminjaman berhasil disimpan.');
}


    /**
     * Show the form for editing the specified peminjaman.
     */
    public function edit($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $buku = Buku::all();
        return view('buku.editpeminjaman', compact('peminjaman', 'buku'));
    }

    /**
     * Update the specified peminjaman in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'buku_id'          => 'required|exists:buku,id',
            'tanggal_pinjam'   => 'required|date',
            'tanggal_kembali'  => 'required|date|after:tanggal_pinjam',
        ]);

        DB::table('peminjaman')
          ->where('id', $id)
          ->update([
              'buku_id'         => $request->buku_id,
              'tanggal_pinjam'  => $request->tanggal_pinjam,
              'tanggal_kembali' => $request->tanggal_kembali,
              'updated_at'      => now(),
          ]);

        return redirect('/peminjaman')
               ->with('success', 'Data peminjaman berhasil diperbarui.');
    }

    /**
     * Remove the specified peminjaman from storage.
     */
    public function destroy($id)
    {
        DB::table('peminjaman')->where('id', $id)->delete();
        return redirect('/peminjaman')
               ->with('success', 'Data peminjaman berhasil dihapus.');
    }

    

    /**
     * Generate and download PDF report of peminjaman.
     */
    public function cetakPdf()
    {
        if (! Session::has('user')) {
            return redirect('/login');
        }

        $data = Peminjaman::with('buku')->get();
        $pdf = PDF::loadView('buku.pdf', compact('data'));

        return $pdf->download('laporan-peminjaman_' . now()->format('Ymd_His') . '.pdf');
    }

public function anggotas()
{
    return $this->belongsTo(\App\Models\Anggota::class, 'anggota_id');
}



}
