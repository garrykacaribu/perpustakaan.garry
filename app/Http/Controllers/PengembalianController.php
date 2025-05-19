<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use Illuminate\Support\Facades\Session;
use PDF;

class PengembalianController extends Controller
{
    public function index()
    {
        $pengembalians = Pengembalian::with('peminjaman.anggota', 'peminjaman.buku')->get();
        return view('buku.pengembalian', compact('pengembalians'));
    }

   public function store(Request $request)
{
    $request->validate([
        'peminjaman_id' => 'required|exists:peminjaman,id',
        'denda' => 'nullable|string|max:255',
    ]);

    // Simpan ke tabel pengembalian
    \App\Models\Pengembalian::create([
        'peminjaman_id' => $request->peminjaman_id,
        'tanggal_pengembalian' => now(),
        'denda' => $request->denda ?? 0,
    ]);

    // Update status peminjaman menjadi 'kembali'
    \App\Models\Peminjaman::where('id', $request->peminjaman_id)
        ->update(['status' => 'kembali']);

    return redirect()->route('pengembalian.index')->with('success', 'Data pengembalian berhasil ditambahkan.');
}

    public function destroy($id)
    {
        $pengembalian = Pengembalian::findOrFail($id);
        $pengembalian->delete();

        return redirect()->route('pengembalian.index')->with('success', 'Data pengembalian berhasil dihapus.');
    }

    /**
     * Cetak data pengembalian ke PDF
     */
    public function cetakPdf()
    {
        if (!Session::has('user')) {
            return redirect('/login');
        }

        $pengembalians = Pengembalian::with('peminjaman.anggota', 'peminjaman.buku')
            ->orderBy('created_at', 'desc')
            ->get();

        $pdf = PDF::loadView('buku.pengembalian_pdf', ['pengembalians' => $pengembalians]);
        return $pdf->download('laporan-pengembalian.pdf');
    }
}