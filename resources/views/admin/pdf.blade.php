<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pemasukan</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        thead {
            background-color: #f2f2f2;
        }

        .total {
            font-weight: bold;
        }

        .download-btn {
            display: block;
            width: 100%;
            text-align: center;
            padding: 10px;
            background-color: #4caf50;
            color: #fff;
            text-decoration: none;
            font-weight: bold;
        }

        .download-btn:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Laporan Pemasukan</h1>

        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Paket Wisata</th>
                    <th>Jumlah Pesanan</th>
                    <th>Jumlah Peserta</th>
                    <th>Pemasukan</th>
                </tr>
            </thead>
            <tbody>
                @forelse($dataPesanan as $index => $pesanan)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $pesanan->paketWisata->nama_paket }}</td>
                    <td>{{ $pesanan->jumlah_pesanan }}</td>
                    <td>{{ $pesanan->jumlah_orang }}</td>
                    <td>Rp {{ number_format($pesanan->total_harga_pesanan, 2, ',', '.') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="5">Pesanan Tidak Ada Pada Rentang Waktu.</td>
                </tr>
                @endforelse

                @if ($totalPemasukan > 0)
                <tr class="total">
                    <td colspan="4">Total Pemasukan</td>
                    <td>Rp {{ number_format($totalPemasukan, 2, ',', '.') }}</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</body>

</html>