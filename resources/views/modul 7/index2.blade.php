<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap Demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
</head>

<body>
    <br>
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <a href="{{ url('/KelasAdd') }}" class="btn btn-primary"><i class="fa-solid fa-file-circle-plus"></i>
                    Tambah Kelas</a>
                <h1 class="text-center w-100">DAFTAR KELAS</h1>
            </div>  
            <div class="card-body d-flex justify-content-center">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kelas</th>
                            <th>Angkatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kelas as $p)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $p->kelas }}</td>
                                <td>{{ $p->angkatan }}</td>
                                <td>
                                    <a href="{{ '/KelasEdit'}}/{{ $p->id }}" class="btn btn-warning btn-sm"><i
                                            class="fa-regular fa-pen-to-square"></i> Edit</a>
                                    <a href="{{'/KelasDelete'}}/{{  $p->id }}" class="btn btn-danger btn-sm"><i
                                            class="fa-regular fa-trash-can"></i> Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/js/all.min.js"></script>
</body>

</html>