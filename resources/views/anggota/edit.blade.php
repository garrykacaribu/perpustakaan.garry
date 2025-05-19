@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Anggota</h2>
    <form action="{{ route('anggota.update', $anggota->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ $anggota->nama }}" required>
        </div>
        <div class="form-group mb-3">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" value="{{ $anggota->alamat }}" required>
        </div>
        <div class="form-group mb-3">
            <label>Telepon</label>
            <input type="text" name="telepon" class="form-control" value="{{ $anggota->telepon }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('anggota.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
