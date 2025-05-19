
@extends('layouts.main')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Hasil Pencarian</h1>
    <p class="mb-4">Hasil pencarian untuk: "{{ $query }}"</p>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Buku</h6>
        </div>
        <div class="card-body">
            @if($buku->count() > 0)
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Cover</th>
                                <th>Judul</th>
                                <th>Penulis</th>
                                <th>Penerbit</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($buku as $item)
                            <tr>
                                <td>
                                    @if($item->gambar_cover)
                                        <img src="{{ asset('imgCover/'.$item->gambar_cover) }}" 
                                             alt="Cover" width="50">
                                    @else
                                        No Cover
                                    @endif
                                </td>
                                <td>{{ $item->judul }}</td>
                                <td>{{ $item->penulis }}</td>
                                <td>{{ $item->penerbit }}</td>
                                <td>
                                    <a href="{{ route('buku.show', $item->id) }}" 
                                       class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('buku.edit', $item->id) }}" 
                                       class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $buku->appends(['query' => $query])->links() }}
            @else
                <p>Tidak ada hasil yang ditemukan.</p>
            @endif
        </div>
    </div>
</div>
@endsection