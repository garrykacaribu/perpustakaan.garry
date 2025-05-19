@extends('layouts.main')

@section('content')
<div class="row mb-3">
    <div class="col">
        <h3>Data Peminjaman</h3>
    </div>
    <div class="col text-right">
        <a href="{{ route('peminjaman.pdf') }}" class="btn btn-success" target="_blank">
            <i class="fas fa-file-pdf"></i> Cetak PDF
        </a>
        <button class="btn btn-primary" data-toggle="modal" data-target="#AddModal">
            <i class="fas fa-plus"></i> Tambah
        </button>
    </div>
</div>

<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped table-bordered mb-0">
                <thead class="text-center">
                    <tr>
                        <th>ID</th>
                        <th>Anggota</th>
                        <th>Buku</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @forelse($peminjaman as $pj)
                        <tr>
                            <td>{{ $pj->id }}</td>
                            <td>{{ $pj->anggota->nama ?? '-' }}</td>
                            <td>{{ $pj->buku->judul ?? '-' }}</td>
                            <td>{{ \Carbon\Carbon::parse($pj->tanggal_pinjam)->format('d-m-Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($pj->tanggal_kembali)->format('d-m-Y') }}</td>
                            <td>
                                <span class="badge badge-{{ $pj->status=='pinjam' ? 'warning' : 'success' }}">
                                    {{ ucfirst($pj->status) }}
                                </span>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    {{-- Kembalikan --}}
                                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#KembaliModal-{{ $pj->id }}">
                                        <i class="fas fa-check"></i>
                                    </button>
                                    {{-- Edit --}}
                                    <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#EditModal-{{ $pj->id }}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    {{-- Hapus --}}
                                    <form action="{{ route('peminjaman.destroy', $pj->id) }}" method="POST" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus peminjaman ini?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Tidak ada data peminjaman.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('modals')
    {{-- ADD Modal --}}
    <form action="{{ route('peminjaman.store') }}" method="POST">
        @csrf
        <div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Peminjaman</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Anggota</label>
                            <select name="anggota_id" class="form-control" required>
                                <option value="">-- Pilih Anggota --</option>
                                @foreach($anggota as $a)
                                    <option value="{{ $a->id }}">{{ $a->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Buku</label>
                            <select name="buku_id" class="form-control" required>
                                <option value="">-- Pilih Buku --</option>
                                @foreach($buku as $b)
                                    <option value="{{ $b->id }}">{{ $b->judul }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Pinjam</label>
                            <input type="date" name="tanggal_pinjam" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Kembali</label>
                            <input type="date" name="tanggal_kembali" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    {{-- EDIT Modal --}}
    @foreach($peminjaman as $pj)
    <form action="{{ route('peminjaman.update', $pj->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="modal fade" id="EditModal-{{ $pj->id }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Peminjaman #{{ $pj->id }}</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Anggota</label>
                            <select name="anggota_id" class="form-control" required>
                                @foreach($anggota as $a)
                                    <option value="{{ $a->id }}" {{ $a->id == $pj->anggota_id ? 'selected' : '' }}>
                                        {{ $a->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Buku</label>
                            <select name="buku_id" class="form-control" required>
                                @foreach($buku as $b)
                                    <option value="{{ $b->id }}" {{ $b->id == $pj->buku_id ? 'selected' : '' }}>
                                        {{ $b->judul }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Pinjam</label>
                            <input type="date" name="tanggal_pinjam" class="form-control" value="{{ $pj->tanggal_pinjam }}" required>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Kembali</label>
                            <input type="date" name="tanggal_kembali" class="form-control" value="{{ $pj->tanggal_kembali }}" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @endforeach

    {{-- KEMBALI Modal --}}
    @foreach($peminjaman as $pj)
    <form action="{{ route('pengembalian.store') }}" method="POST">
        @csrf
       <input type="hidden" name="peminjaman_id" value="{{ $pj->id }}">
        <div class="modal fade" id="KembaliModal-{{ $pj->id }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Pengembalian Buku #{{ $pj->id }}</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                    </div>
                    <div class="modal-body text-center">
                        <p>Konfirmasi pengembalian buku <strong>{{ $pj->buku->judul }}</strong> oleh <strong>{{ $pj->anggota->nama }}</strong>?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Kembalikan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @endforeach
@endsection
