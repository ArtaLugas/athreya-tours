<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Pesanan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
        }

        .container {
            background-color: #ffffff;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        hr {
            margin: 20px 0;
            border: 1px solid #ddd;
        }

        h3 {
            font-size: 20px;
            margin-bottom: 10px;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            background-color: #fff;
            color: #333;
        }

        th {
            text-align: left;
        }

        th:last-child,
        td:last-child {
            text-align: right;
        }

        tfoot {
            font-weight: bold;
            background-color: #eee;
        }

        /* Dark Mode */
        @media (prefers-color-scheme: dark) {
            body {
                background-color: #333;
                color: #fff;
            }

            .container {
                background-color: #222;
                box-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
            }

            h1 {
                color: #fff;
            }

            hr {
                border-color: #555;
            }

            h3 {
                color: #fff;
            }

            table {
                background-color: #222;
            }

            th,
            td {
                background-color: #222;
                color: #fff;
            }

            tfoot {
                background-color: #444;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Invoice Pesanan</h1>
        <hr>

        <!-- Informasi Pemesan -->
        <h3>Informasi Pemesan</h3>
        <p>Nama: {{ $user->name }}</p>
        <p>Email: {{ $user->email }}</p>

        <!-- Rincian Pesanan -->
        <h3>Rincian Pesanan</h3>
        <p>ID Pesanan: #{{ $order->id }}</p>
        <p>Tanggal Pesanan: {{ $order->created_at }}</p>
        <table>
            <thead>
                <tr>
                    <th>Paket Wisata</th>
                    <th>Jumlah Peserta</th>
                    <th>Harga</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $order->paketWisata->nama_paket }}</td>
                    <td>{{ $order->jumlah_orang }}</td>
                    <td>Rp {{ number_format($order->paketWisata->harga, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($order->total_harga, 0, ',', '.') }}</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3">Total:</td>
                    <td>Rp {{ number_format($order->total_harga, 0, ',', '.') }}</td>
                </tr>
            </tfoot>
        </table>

        <!-- Instruksi Pembayaran -->
        <h3>Instruksi Pembayaran</h3>
        <p>Silakan lakukan pembayaran sesuai dengan total pesanan ke rekening berikut:</p>
        <p>Nomor Rekening: 1234-5678-9012-3456</p>
        <p>Bank: Contoh Bank</p>
        <p>Atas Nama: Nama Anda</p>

        <!-- Informasi Kontak -->
        <h3>Informasi Kontak</h3>
        <p>Jika Anda memiliki pertanyaan atau butuh bantuan, silakan hubungi kami melalui:</p>
        <p>Email: athreyatours.id@gmail.com</p>
        <p>Telepon: +62 812-2644-8469</p>
    </div>
</body>

</html>