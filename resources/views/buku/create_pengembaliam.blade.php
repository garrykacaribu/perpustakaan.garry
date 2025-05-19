@extends('layouts.main')
@section('content')

<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header">Form Pengembalian</div>
            <div class="card-body">
                <form action="{{ route('pengembalian.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="peminjaman_id">Pilih Peminjaman</label>
                        <select name="peminjaman_id" class="form-control" required>
                            <option value="">-- Pilih --</option>
                            @foreach($peminjamans as $p)
                                <option value="{{ $p->id }}">
                                    {{ $p->anggota->nama }} - {{ $p->buku->judul }} (Pinjam: {{ $p->tanggal_pinjam }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="tanggal_pengembalian">Tanggal Pengembalian</label>
                        <input type="date" name="tanggal_pengembalian" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('pengembalian.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
