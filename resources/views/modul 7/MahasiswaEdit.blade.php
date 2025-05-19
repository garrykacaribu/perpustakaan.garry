<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
</head>

<body>
    <br>
    <div class="container">
        <div class="card">
            <div class="card-header">
                EDIT MAHASISWA
            </div>
            <div class="card-body">
                @foreach ($mahasiswa as $mhs)
                    <form action="{{ url('/mahasiswaupdate') }}" method="post">
                        {{ csrf_field() }}
                        <div class="mb-3">
                            <label for="nim" class="form-label">NIM</label>
                            <input type="hidden" name="id" value="{{ $mhs->id }}">
                            <input type="number" name="nim" value="{{ $mhs->nim }}" class="form-control"
                                id="nim" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" name="nama" value="{{ $mhs->nama }}" class="form-control"
                                id="nama">
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" name="alamat" value="{{ $mhs->alamat }}" class="form-control"
                                id="alamat">
                        </div>
                        <div class="mb-3">
                            <label for="kelas" class="form-label">Kelas</label>
                            <input type="number" name="kelas" value="{{ $mhs->kelas }}" class="form-control"
                                id="kelas">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                @endforeach
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/js/all.min.js"></script>
</body>

</html>