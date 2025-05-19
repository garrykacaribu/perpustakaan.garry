@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Data Pengembalian
                <a href="{{ route('pengembalian.pdf') }}" class="btn btn-danger float-right">
                    <i class="fas fa-file-pdf"></i> Cetak PDF
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead class="text-center">
                            <tr>
                                <th>Nama Anggota</th>
                                <th>Judul Buku</th>
                                <th>Tanggal Pinjam</th>
                                <th>Tanggal Kembali</th>
                                <th>Tanggal Pengembalian</th>
                                <th>Denda</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach($pengembalians as $pengembalian)
                            <tr>
                                <td>{{ $pengembalian->peminjaman->anggota->nama ?? '-' }}</td>
                                <td>{{ $pengembalian->peminjaman->buku->judul ?? '-' }}</td>
                                <td>{{ $pengembalian->peminjaman->tanggal_pinjam ?? '-' }}</td>
                                <td>{{ $pengembalian->peminjaman->tanggal_kembali ?? '-' }}</td>
                                <td>{{ $pengembalian->tanggal_pengembalian }}</td>
                                <td>{{ $pengembalian->denda ?? '-' }}</td>
                                <td>
                                    <form action="{{ url('pengembalian/' . $pengembalian->id . '/delete') }}" method="POST">
                                        @csrf
                                     <a href="{{ route('pengembalian.destroy', $pengembalian->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data?')">
    <i class="fas fa-trash"></i> Hapus
</a>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @if($pengembalians->isEmpty())
                        <p class="text-center mt-3">Belum ada data pengembalian.</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
