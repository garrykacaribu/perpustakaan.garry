@extends('layouts.main')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Data Anggota
              <a class="btn btn-primary float-right" href="#" data-toggle="modal" data-target="#AddModal">
                <i class="fas fa-plus fa-sm fa-fw mr-2 text-gray-400"></i> Tambah
              </a>
            </div>
            <div class="card-body"></div>
        </div>
        <div class="table-responsive mt-3">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($anggota as $item)
                    <tr class="text-center">
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>{{ $item->telepon }}</td>
                        <td>
                            <div class="btn-group">
                                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#EditModal-{{ $item->id }}">
                                    <i class="fas fa-edit"></i> Edit
                                </button>
                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#DeleteModal-{{ $item->id }}">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </div>
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
{{-- ADD Modal --}} <form action="{{ route('anggota.store') }}" method="POST">
@csrf <div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="AddModalLabel" aria-hidden="true"> <div class="modal-dialog" role="document"> <div class="modal-content"> <div class="modal-header"> <h5 class="modal-title" id="AddModalLabel">Tambah Anggota</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div> <div class="modal-body"> <div class="form-group"> <label>Nama</label> <input type="text" name="nama" class="form-control" required> </div> <div class="form-group"> <label>Alamat</label> <input type="text" name="alamat" class="form-control" required> </div> <div class="form-group"> <label>Telepon</label> <input type="text" name="telepon" class="form-control" required> </div> </div> <div class="modal-footer"> <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button> <button type="submit" class="btn btn-primary">Simpan</button> </div> </div> </div> </div> </form>

```
{{-- EDIT Modal --}}
@foreach($anggota as $item)
<form action="{{ route('anggota.update', $item->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="modal fade" id="EditModal-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="EditModalLabel-{{ $item->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="EditModalLabel-{{ $item->id }}">Edit Anggota</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" value="{{ $item->nama }}" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="alamat" class="form-control" value="{{ $item->alamat }}" required>
                    </div>
                    <div class="form-group">
                        <label>Telepon</label>
                        <input type="text" name="telepon" class="form-control" value="{{ $item->telepon }}" required>
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

{{-- DELETE Modal --}}
@foreach($anggota as $item)
<form action="{{ route('anggota.destroy', $item->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <div class="modal fade" id="DeleteModal-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="DeleteModalLabel-{{ $item->id }}" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="DeleteModalLabel-{{ $item->id }}">Hapus Anggota</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Yakin ingin menghapus anggota <strong>{{ $item->nama }}</strong>?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endforeach
```

@endsection
