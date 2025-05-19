
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Peminjaman Buku</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            font-size: 12px;
            line-height: 1.4;
            color: #333;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header h1 {
            font-size: 24px;
            color: #2c3e50;
            margin-bottom: 5px;
        }
        .header p {
            color: #7f8c8d;
            margin: 0;
        }
        .info {
            margin-bottom: 20px;
            padding: 10px;
            background: #f8f9fa;
            border-radius: 4px;
        }
        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }
        table { 
            width: 100%; 
            border-collapse: collapse; 
            margin-top: 1rem;
            background: white;
        }
        th { 
            background: #3498db; 
            color: white;
            padding: 12px;
            font-size: 13px;
        }
        td { 
            padding: 10px;
            border: 1px solid #ddd;
        }
        tr:nth-child(even) {
            background: #f8f9fa;
        }
        .status {
            padding: 4px 8px;
            border-radius: 4px;
            font-weight: bold;
        }
        .status-pinjam {
            background: #ffeaa7;
            color: #d35400;
        }
        .status-kembali {
            background: #55efc4;
            color: #00b894;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 11px;
            color: #7f8c8d;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Laporan Peminjaman Buku</h1>
        <p>Perpustakaan Digital MVC Laravel</p>
    </div>

    <div class="info">
        <div class="info-grid">
            <div>
                <p>Tanggal Cetak: {{ date('d/m/Y') }}</p>
                <p>Total Peminjaman: {{ count($data) }}</p>
            </div>
            <div>
                <p>Periode: Semua</p>
                <p>Status: Semua</p>
            </div>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th style="width: 5%">#</th>
                <th style="width: 20%">Anggota</th>
                <th style="width: 30%">Judul Buku</th>
                <th style="width: 15%">Tgl. Pinjam</th>
                <th style="width: 15%">Tgl. Kembali</th>
                <th style="width: 15%">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $i => $pj)
                <tr>
                    <td style="text-align: center">{{ $i + 1 }}</td>
                    <td>{{ $pj->anggota->nama ?? '—' }}</td>
                    <td>{{ $pj->buku->judul ?? '—' }}</td>
                    <td>{{ \Carbon\Carbon::parse($pj->tanggal_pinjam)->format('d/m/Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($pj->tanggal_kembali)->format('d/m/Y') }}</td>
                    <td>
                        <span class="status {{ $pj->status == 'kembali' ? 'status-kembali' : 'status-pinjam' }}">
                            {{ ucfirst($pj->status) }}
                        </span>
                    </td>
                </tr>
            @endforeach
            @if(count($data) === 0)
                <tr>
                    <td colspan="6" style="text-align: center;">Tidak ada data peminjaman.</td>
                </tr>
            @endif
        </tbody>
    </table>

    <div class="footer">
        <p>Dokumen ini digenerate secara otomatis pada {{ date('d/m/Y H:i:s') }}</p>
    </div>
</body>
</html>