<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
</head>
<body>
    <br>
    <div class="container">
        <div class="card">
            <div class="card-header">
                TAMBAH BUKU
            </div>
            <div class="card-body">
               <form action="/bukusave" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="mb-3">
        <label for="judul" class="form-label">Judul</label>
        <input type="text" name="judul" class="form-control" id="judul">
    </div>
    <div class="mb-3">
        <label for="penulis" class="form-label">Penulis</label>
        <input type="text" name="penulis" class="form-control" id="penulis">
    </div>
    <div class="mb-3">
        <label for="penerbit" class="form-label">Penerbit</label>
        <input type="text" name="penerbit" class="form-control" id="penerbit">
    </div>
    <div class="mb-3">
        <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
        <input type="date"  name="tahun_terbit" class="form-control" id="tahun_terbit">
    </div>
    <div class="mb-3">
        <label for="isbn" class="form-label">ISBN</label>
        <input type="number" name="isbn" class="form-control" id="isbn">
    </div>
    <div class="mb-3">
        <label for="ringkasan" class="form-label">Ringkasan</label>
        <input type="text" name="ringkasan" class="form-control" id="ringkasan">
    </div>
    <div class="mb-3">
        <label for="halaman" class="form-label">Halaman</label>
        <input type="number" name="halaman" class="form-control" id="halaman">
    </div>
    <div class="mb-3">
        <label for="genre" class="form-label">Genre</label>
        <input type="text" name="genre" class="form-control" id="genre">
    </div>
    <div class="mb-3">
        <label for="gambar_cover" class="form-label">Gambar Cover</label>
        <input type="file" name="gambar_cover" class="form-control" id="gambar_cover" required>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/js/all.min.js"></script>
</body>
</html>