<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Peminjaman;
use App\Models\Pengembalian;

class Anggota extends Model
{
    use HasFactory;

    protected $table = 'anggotas'; // ← Tambahkan ini untuk mencocokkan dengan migration

    protected $fillable = [
        'nama',
        'alamat',
        'telepon',
    ];

    public function peminjamans()
    {
        return $this->hasMany(Peminjaman::class, 'anggota_id');
    }

    public function pengembalians()
    {
        return $this->hasManyThrough(
            Pengembalian::class,
            Peminjaman::class,
            'anggota_id',
            'peminjaman_id',
            'id',
            'id'
        );
    }
}
