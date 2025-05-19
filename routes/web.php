<?php

use App\Http\Controllers\CalculatorController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PengunjungController;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\AnggotaController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    if (Session::has('user')) {
        return view('welcome');
    }
    return redirect('/login');
})->name('dashboard');

// Route::get('/', function () {
//     return view('buku.login');
// });

// Tampilkan daftar anggota
Route::get('/anggota', [AnggotaController::class, 'index'])
     ->name('anggota.index');

// Tampilkan form tambah anggota
Route::get('/anggota/create', [AnggotaController::class, 'create'])
     ->name('anggota.create');

// Proses simpan anggota baru
Route::post('/anggota/store', [AnggotaController::class, 'store'])
     ->name('anggota.store');

// Tampilkan form edit anggota
Route::get('/anggota/{id}/edit', [AnggotaController::class, 'edit'])
     ->name('anggota.edit');

// Proses update anggota
Route::put('/anggota/{id}', [AnggotaController::class, 'update'])
     ->name('anggota.update');

// Hapus anggota
Route::delete('/anggota/{id}', [AnggotaController::class, 'destroy'])
     ->name('anggota.destroy');



// Tampilkan daftar buku
Route::get('/buku', [BukuController::class, 'buku'])->name('buku.index');

// Tampilkan form tambah buku (jika ada)
Route::get('/tambahbuku', [BukuController::class, 'tambah'])->name('buku.tambah');

// Tampilkan form edit buku
Route::get('/editbuku/{id}', [BukuController::class, 'edit'])->name('buku.edit');

// Proses simpan buku baru
Route::post('/bukusave', [BukuController::class, 'store'])->name('buku.store');

// Proses update buku
Route::post('/bukuupdate', [BukuController::class, 'update'])->name('buku.update');

// Proses hapus buku
Route::post('/bukudelete', [BukuController::class, 'destroy'])->name('buku.destroy');

Route::get('/buku/search', [BukuController::class, 'search'])->name('buku.search');


//rute peminjaman
// Tampilkan daftar peminjaman
Route::get('/peminjaman', [PeminjamanController::class, 'peminjaman'])
     ->name('peminjaman.index');

// Proses simpan peminjaman (store)
Route::post('/peminjaman/store', [PeminjamanController::class, 'store'])
     ->name('peminjaman.store');

// Form edit
Route::get('/peminjaman/edit/{id}', [PeminjamanController::class, 'edit'])
     ->name('peminjaman.edit');

// Proses update
Route::put('/peminjaman/update/{id}', [PeminjamanController::class, 'update'])->name('peminjaman.update');

// Hapus
Route::delete('/peminjaman/{id}', [PeminjamanController::class, 'destroy'])
     ->name('peminjaman.destroy');

// Cetak PDF
Route::get('/peminjaman/pdf', [PeminjamanController::class, 'cetakPdf'])
     ->name('peminjaman.pdf');


Route::get('/pengembalian', [PengembalianController::class, 'index']);
Route::post('/pengembalian-save', [PengembalianController::class, 'pengembalian']);


Route::get('/', [PengunjungController::class, 'index']);

//rute pengembalian
Route::get('/pengembalian', [PengembalianController::class, 'index'])->name('pengembalian.index');
Route::post('/pengembalian/store', [PengembalianController::class, 'store'])->name('pengembalian.store');
Route::get('/pengembalian/delete/{id}', [PengembalianController::class, 'destroy'])->name('pengembalian.destroy');
Route::get('/pengembalian/pdf', [PengembalianController::class, 'cetakPdf'])->name('pengembalian.pdf');


// Route::get('/peminjaman', [PeminjamanController::class, 'peminjaman']);
// // Route::post('/peminjaman/store', [PeminjamanController::class, 'store']);
// Route::get('/peminjaman/edit/{id}', [PeminjamanController::class, 'edit']);
// Route::post('/peminjaman/update/{id}', [PeminjamanController::class, 'update']);
// Route::delete('/peminjaman/{id}', [PeminjamanController::class, 'destroy'])
//      ->name('peminjaman.destroy');

// // PDF report
// Route::get('/peminjaman/pdf', [PeminjamanController::class, 'exportPdf'])
//      ->name('peminjaman.pdf');

// Laporan Pengembalian





//login
// Route::get('/login', [UsersController::class, 'index']);
// Route::post('/proses-login', [UsersController::class, 'login']);

// Route::get('/awal', function () {
//     return view('awal');
// });

// //Project Akhir
// Route::get('/dashboard', function () {
//     return view('welcome');
// });





// Route::get('/gaji', function () {
//     return view('gaji');
// });


// Route::post('/gaji', function (Request $request) {
//     return view('gaji', ['biodata' => $request]);
// });

// Route::get('/cek', function () {
//     return "Halo kawan, Selamat berlatih laravel";
// });

// Route::get('/cek/{Nama}', function ($Nama) {
//     return "Halo $Nama, Selamat berlatih laravel";
// });
// Route::get('/kalkulator', function () {
//     return view('kalkulator');
// });

// RUTE KALKULATOR posttest modul 5
// Route::post('/hitung', function (Request $request) {
//     $bil1 = $request->input('bil1');
//     $bil2 = $request->input('bil2');
//     $operator = $request->input('operator');
//     $hasil = 0;
//     switch ($operator) {
//         case '+':
//             $hasil = $bil1 + $bil2;
//             break;
//         case '-':
//             $hasil = $bil1 - $bil2;
//             break;
//         case '*':
//             $hasil = $bil1 * $bil2;
//             break;
//         case '/':
//             if ($bil2 != 0) {
//                 $hasil = $bil1 / $bil2;
//             } else {
//                 $hasil = "Error: Pembagian dengan 0 tidak diizinkan";
//             }
//             break;
//         default:
//             $hasil = "Operator tidak valid";
//     }
//     return view('kalkulator', ['hasil' => $hasil]);
// });
// Route::get('/kalkulator10', function () {
//     return view('kalkulator10');
// });

// Route::get('/home', function () {
//     return view('home', ['nama' => 'Azis']);
// });
// Route::get('/about', function () {
//     return view('about');
// });
// Route::get('/blog', function () {
//     return view('blog');
// });
// Route::get('/contact', function () {
//     return view('contact');
// });



// // admin lte
// Route::get('/Mahasiswa', [MahasiswaController::class, 'index']);
// Route::get('/tambahmahasiswa', [MahasiswaController::class, 'tambah']);
// Route::post('/mahasiswasave', [MahasiswaController::class, 'store']);
// Route::get('/editmahasiswa/{id}', [MahasiswaController::class, 'edit']);
// Route::post('/mahasiswaupdate', [MahasiswaController::class, 'update']);
// Route::delete('/mahasiswadelete/{id}', [MahasiswaController::class, 'destroy']);
// // end


// // Route::get('/Mahasiswa', [MahasiswaController::class, 'index']);
// // Route::get('/mahasiswaadd', [MahasiswaController::class, 'tambah']);
// // Route::get('/editmahasiswa/{id}', [MahasiswaController::class, 'edit']);
// // Route::post('/mahasiswaupdate', [MahasiswaController::class, 'update']);
// // Route::post('/mahasiswasave', [MahasiswaController::class, 'store']);
// // Route::get('/mahasiswadelete/{id}', [MahasiswaController::class, 'destroy']);

// Route::get('/Kelas', [KelasController::class, 'index']);
// Route::get('/KelasAdd', [KelasController::class, 'Create']);
// Route::get('/KelasEdit/{id}', [KelasController::class, 'edit']);
// Route::post('/KelasSave', [KelasController::class, 'store']);
// Route::post('/KelasUpdate', [KelasController::class, 'update']);
// Route::get('/KelasDelete/{id}', [KelasController::class, 'destroy']);
