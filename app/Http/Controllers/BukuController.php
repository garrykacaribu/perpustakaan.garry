<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Models\Peminjaman;


class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
 public function buku()
{
    // Ambil semua data buku
   $buku = Buku::all();
    return view('buku.index', compact('buku'));
}
    /**
     * Show the form for creating a new resource.
     */
    public function tambah()
    {
        return view('buku.tambahbuku');
    }

    /**
     * Store a newly created resource in storage.
     */
  public function store(Request $request)
{
    // Validasi input
    $request->validate([
        'judul' => 'required',
        'penulis' => 'required',
        'penerbit' => 'required',
        'tahun_terbit' => 'required',
        'isbn' => 'required',
        'ringkasan' => 'required',
        'halaman' => 'required|numeric',
        'genre' => 'required',
        'gambar_cover' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    try {
        // Upload gambar
        $file = $request->file('gambar_cover');
        $nama_file = time().'_'.$file->getClientOriginalName();
        $file->move(public_path('imgCover'), $nama_file);

        // Simpan ke database
        Buku::create([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'penerbit' => $request->penerbit,
            'tahun_terbit' => $request->tahun_terbit,
            'isbn' => $request->isbn,
            'ringkasan' => $request->ringkasan,
            'halaman' => $request->halaman,
            'genre' => $request->genre,
            'gambar_cover' => $nama_file,
        ]);

        return redirect('/buku')->with('success', 'Buku berhasil ditambahkan!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Gagal menambahkan buku: ' . $e->getMessage());
    }
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
        $buku = DB::table('buku')->where('id', $id)->get();
        return view('buku.editbuku', ['dt' => $buku]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required',
            'isbn' => 'required',
            'ringkasan' => 'required',
            'halaman' => 'required',
            'genre' => 'required',
            'gambar_cover' => 'mimes:jpeg,png,jpg|max:2048',
        ]);


        $buku = Buku::findOrFail($request->id);

        if ($request->hasFile('gambar_cover')) {

            $imageName = time() . '.' . $request->gambar_cover->extension();

            $request->gambar_cover->move(public_path('imgCover'), $imageName);

            // $buku->gambar_cover->delete(public_path('imgCover'), $buku->gambar_cover);

            // Simpan nama file lama untuk dihapus nanti
            $oldImage = $buku->gambar_cover;

            if ($oldImage) {
                $oldImagePath = public_path('imgCover') . '/' . $oldImage;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            DB::table('buku')->where('id', $request->id)->update([
                'judul' => $request->judul,
                'penulis' => $request->penulis,
                'penerbit' => $request->penerbit,
                'tahun_terbit' => $request->tahun_terbit,
                'isbn' => $request->isbn,
                'ringkasan' => $request->ringkasan,
                'halaman' => $request->halaman,
                'genre' => $request->genre,
                'gambar_cover' => $imageName,
            ]);
        } else {
            DB::table('buku')->where('id', $request->id)->update([
                'judul' => $request->judul,
                'penulis' => $request->penulis,
                'penerbit' => $request->penerbit,
                'tahun_terbit' => $request->tahun_terbit,
                'isbn' => $request->isbn,
                'ringkasan' => $request->ringkasan,
                'halaman' => $request->halaman,
                'genre' => $request->genre,
            ]);
        }


        return redirect('/buku');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {

       $bukuId = $request->id;

    // Cek apakah buku masih dipakai di peminjaman
    $cekPeminjaman = \App\Models\Peminjaman::where('buku_id', $bukuId)->exists();

    if ($cekPeminjaman) {
        return redirect('/buku')->with('error', 'Buku tidak bisa dihapus karena masih digunakan di data peminjaman.');
    }

    $buku = Buku::findOrFail($bukuId);

    // Hapus gambar cover jika ada
    $oldImage = $buku->gambar_cover;
    if ($oldImage) {
        $oldImagePath = public_path('imgCover') . '/' . $oldImage;
        if (file_exists($oldImagePath)) {
            unlink($oldImagePath);
        }
    }

    // Hapus data buku
    $buku->delete();

    return redirect('/buku')->with('success', 'Buku berhasil dihapus.');
    }

public function search(Request $request)
{
    $query = $request->input('query');
    
    $buku = Buku::where('judul', 'LIKE', "%{$query}%")
                ->orWhere('penulis', 'LIKE', "%{$query}%")
                ->orWhere('penerbit', 'LIKE', "%{$query}%")
                ->orWhere('ringkasan', 'LIKE', "%{$query}%")
                ->paginate(10);
    
    return view('buku.index', [
        'buku' => $buku,
    ]);
}
}