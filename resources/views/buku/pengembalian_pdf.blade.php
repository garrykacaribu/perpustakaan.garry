
<!DOCTYPE html>
<html>
<head>
    <title>Laporan Pengembalian Buku</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            line-height: 1.6;
            color: #2c3e50;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid #3498db;
        }
        .header h2 {
            margin-bottom: 5px;
            font-size: 24px;
            text-transform: uppercase;
            color: #2c3e50;
        }
        .header p {
            margin-top: 0;
            font-size: 14px;
            color: #7f8c8d;
        }
        .info {
            margin-bottom: 25px;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 5px;
            display: flex;
            justify-content: space-between;
        }
        .info p {
            margin: 5px 0;
            font-size: 14px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13px;
            margin-bottom: 30px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        table, th, td {
            border: 1px solid #e9ecef;
        }
        th {
            background-color: #3498db;
            color: white;
            padding: 12px 8px;
            text-align: center;
            font-weight: bold;
            font-size: 13px;
        }
        td {
            padding: 10px 8px;
            text-align: center;
        }
        tr:nth-child(even) {
            background-color: #f8f9fa;
        }
        tr:hover {
            background-color: #f1f3f5;
        }
        .status-kembali {
            background: #27ae60;
            color: white;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
            text-transform: uppercase;
            display: inline-block;
        }
        .footer {
            margin-top: 50px;
            text-align: right;
            font-size: 14px;
        }
        .signature {
            margin-top: 80px;
            border-top: 2px dotted #bdc3c7;
            width: 200px;
            display: inline-block;
            text-align: center;
            padding-top: 10px;
        }
        .signature p {
            margin: 5px 0;
        }
        .page-number {
            position: fixed;
            bottom: 20px;
            width: 100%;
            text-align: center;
            font-size: 12px;
            color: #7f8c8d;
        }
        .meta-info {
            color: #7f8c8d;
            font-size: 12px;
            text-align: left;
            margin-top: 5px;
        }
        .total-box {
            background: #3498db;
            color: white;
            padding: 10px;
            border-radius: 4px;
            display: inline-block;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>Laporan Data Pengembalian Buku</h2>
        <p>Perpustakaan Digital MVC Laravel</p>
        <div class="meta-info">
            Generated on: {{ date('d F Y, H:i:s') }}
        </div>
    </div>

    <div class="info">
        <div>
            <div class="total-box">
                Total Pengembalian: {{ count($pengembalians) }} buku
            </div>
            <p>Periode Laporan: {{ date('d/m/Y') }}</p>
        </div>
        <div>
            <p>Status: Pengembalian</p>
            <p>Filter: Semua Data</p>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="10%">ID Buku</th>
                <th width="25%">Judul Buku</th>
                <th width="20%">Nama Peminjam</th>
                <th width="15%">Tgl Pinjam</th>
                <th width="15%">Tgl Kembali</th>
                <th width="10%">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pengembalians as $index => $pj)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $pj->peminjaman->buku->id ?? '-' }}</td>
                <td style="text-align: left;">{{ $pj->peminjaman->buku->judul ?? 'Data tidak tersedia' }}</td>
                <td style="text-align: left;">{{ $pj->peminjaman->anggota->nama ?? 'Data tidak tersedia' }}</td>
                <td>{{ $pj->peminjaman->tanggal_pinjam ? \Carbon\Carbon::parse($pj->peminjaman->tanggal_pinjam)->format('d/m/Y') : '-' }}</td>
                <td>{{ $pj->peminjaman->tanggal_kembali ? \Carbon\Carbon::parse($pj->peminjaman->tanggal_kembali)->format('d/m/Y') : '-' }}</td>
                <td><span class="status-kembali">{{ $pj->peminjaman->status ?? '-' }}</span></td>
            </tr>
            @endforeach
            @if(count($pengembalians) === 0)
            <tr>
                <td colspan="7" style="text-align: center; padding: 20px;">Tidak ada data pengembalian</td>
            </tr>
            @endif
        </tbody>
    </table>

    <div class="footer">
        <p>{{ date('d F Y') }}</p>
        <p>Petugas Perpustakaan,</p>
        
        <div class="signature">
            <p>(_____________________)</p>
            <p style="font-size: 12px; color: #7f8c8d;">Tanda Tangan & Nama Lengkap</p>
        </div>
    </div>

    <div class="page-number">
        Halaman 1 dari 1
    </div>
</body>
</html>