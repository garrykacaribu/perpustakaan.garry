@extends('layouts.main')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Data Buku <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#AddModal">
                <i class="fas fa-plus fa-sm fa-fw mr-2 text-gray-400"></i>
             Tambah
            </a></div>
            <div class="card-body"></div>
        </div>
        <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Tahun Terbit</th>
                    <th>ISBN</th>
                    <th>Ringkasan</th>
                    <th>Halaman</th>
                    <th>Genre</th>
                    <th>Gambar Cover</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody> 
                @foreach($buku as $b)
                <tr>
                    <td>{{ $b->judul }}</td>
                    <td>{{ $b->penulis }}</td>
                    <td>{{ $b->penerbit }}</td>
                    <td>{{ $b->tahun_terbit }}</td>
                    <td>{{ $b->isbn }}</td>
                    <td>{{ $b->ringkasan }}</td>
                    <td>{{ $b->halaman }}</td>
                    <td>{{ $b->genre }}</td>
                    <td><img src="{{ asset('imgCover/' . $b->gambar_cover) }}" alt="{{ $b->gambar_cover }}" width="100"></td>
                    <td>
                        <a class="btn btn-info btn-sm" href="#" data-toggle="modal" data-target="#EditModal-{{ $b->id }}">
                            <i class="fa-fw mr-2 text-gray-400"></i>
                        Edit
                        </a>
                        <a class="btn btn-danger btn-sm"" href="#" data-toggle="modal" data-target="#DeleteModal-{{ $b->id }}">
                            <i class="fa-fw mr-2 text-gray-400"></i>
                       Delete
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
</div>
@endsection

@section('modals')
    {{-- ADD Modal --}}
    <form action="/bukusave" method="post" enctype="multipart/form-data">
 <div class="modal fade" id="AddModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
 aria-hidden="true">
 <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <h5 class="modal-title" id="exampleModalLabel">Tambah Buku</h5>
             <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">×</span>
             </button>
         </div>
         <div class="modal-body">

                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="kelas" class="form-label">Judul</label>
                                    <input type="text" name="judul" class="form-control" id="judul" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="kelas" class="form-label">Penulis</label>
                                    <input type="text" name="penulis" class="form-control" id="penulis" required>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="angkatan" class="form-label">Penerbit</label>
                            <input type="text" name="penerbit" class="form-control" id="penerbit" required>
                        </div>
                        <div class="mb-3">
                            <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                            <input type="date" name="tahun_terbit" class="form-control" id="tahun_terbit" required>
                        </div>
                        <div class="mb-3">
                            <label for="isbn" class="form-label">ISBN</label>
                            <input type="number" name="isbn" class="form-control" id="isbn" required>
                        </div>
                        <div class="mb-3">
                            <label for="ringkasan" class="form-label">Ringkasan</label>
                            <input type="text" name="ringkasan" class="form-control" id="ringkasan" required>
                        </div>
                        <div class="mb-3">
                            <label for="halaman" class="form-label">Halaman</label>
                            <input type="number" name="halaman" class="form-control" id="halaman" required>
                        </div>
                        <div class="mb-3">
                            <label for="genre" class="form-label">Genre</label>
                            <input type="text" name="genre" class="form-control" id="genre" required>
                        </div>
                        <div class="form-group">
                            <label for="gambar_cover">Gambar Cover</label>
                            <input type="file" name="gambar_cover" id="gambar_cover" required>
                          </div>
            </div>
         <div class="modal-footer">
             <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
             <button class="btn btn-primary" type="submit">Simpan</button>
         </div>
     </div>
 </div>
</div>
</form>
{{-- End --}}
{{-- Edit Modal --}}
@foreach ($buku as $key => $items)
    <form action="/bukuupdate" method="post" enctype="multipart/form-data">
        <div class="modal fade" id="EditModal-{{ $items->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Buku</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                           {{ csrf_field() }}
                           <input type="hidden" name="id" value="{{ $items->id }}">
                           <div class="mb-3">
                               <label for="judul" class="form-label">Judul</label>
                               <input type="text" name="judul" class="form-control" id="judul" value="{{ $items->judul }}" required>
                           </div>
                           <div class="mb-3">
                               <label for="penulis" class="form-label">Penulis</label>
                               <input type="text" name="penulis" class="form-control" id="penulis" value="{{ $items->penulis }}" required>
                           </div>
                           <div class="mb-3">
                               <label for="penerbit" class="form-label">Penerbit</label>
                               <input type="text" name="penerbit" class="form-control" id="penerbit" value="{{ $items->penerbit }}" required>
                           </div>
                           <div class="mb-3">
                               <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                               <input type="date" name="tahun_terbit" class="form-control" id="tahun_terbit" value="{{ $items->tahun_terbit }}" required>
                           </div>
                           <div class="mb-3">
                               <label for="isbn" class="form-label">ISBN</label>
                               <input type="number" name="isbn" class="form-control" id="isbn" value="{{ $items->isbn }}" required>
                           </div>
                           <div class="mb-3">
                               <label for="ringkasan" class="form-label">Ringkasan</label>
                               <input type="text" name="ringkasan" class="form-control" id="ringkasan" value="{{ $items->ringkasan }}" required>
                           </div>
                           <div class="mb-3">
                               <label for="halaman" class="form-label">Halaman</label>
                               <input type="number" name="halaman" class="form-control" id="halaman" value="{{ $items->halaman }}" required>
                           </div>
                           <div class="mb-3">
                               <label for="genre" class="form-label">Genre</label>
                               <input type="text" name="genre" class="form-control" id="genre" value="{{ $items->genre }}" required>
                           </div>
                           <div class="form-group">
                            <label for="gambar_cover">Gambar Cover</label>
                            <input type="file" name="gambar_cover" id="gambar_cover">
                          </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
            </div>
        </div>
       </div>
       </form>
    @endforeach

    @foreach ($buku as $key => $items)
    
    <form action="/bukudelete" method="post">
        <div class="modal fade" id="DeleteModal-{{ $items->id }}"data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Buku</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ csrf_field() }}
                    <input type="hidden" name="id"  value="{{ $items->id }}">
                    <p>Apakah Anda Yakin akan menghapus "{{ $items->id }}" ?</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-danger" type="submit">Hapus</button>
                </div>
            </div>
        </div>
       </div>
       </form>
    @endforeach
@endsection

<!-- view blade anggota -->
