<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Pesanan</title>
</head>
<body>
    <div style="background-color: #f5f5f5; padding: 20px;">
        <div style="background-color: #ffffff; max-width: 600px; margin: 0 auto; padding: 20px; border-radius: 5px;">
            <h1 style="text-align: center; color: #333;">Invoice Pesanan</h1>
            <hr>

            <!-- Informasi Pemesan -->
            <h3>Informasi Pemesan</h3>
            <p>Nama: {{ $user->name }}</p>
            <p>Email: {{ $user->email }}</p>

            <!-- Rincian Pesanan -->
            <h3>Rincian Pesanan</h3>
            <p>ID Pesanan: #{{ $order->id }}</p>
            <p>Tanggal Pesanan: {{ $order->created_at }}</p>
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr>
                        <th style="border: 1px solid #ddd; padding: 8px; text-align: left;">Paket Wisata</th>
                        <th style="border: 1px solid #ddd; padding: 8px; text-align: right;">Jumlah Peserta</th>
                        <th style="border: 1px solid #ddd; padding: 8px; text-align: right;">Harga</th>
                        <th style="border: 1px solid #ddd; padding: 8px; text-align: right;">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="border: 1px solid #ddd; padding: 8px;">{{ $order->paketWisata->nama_paket }}</td>
                        <td style="border: 1px solid #ddd; padding: 8px; text-align: right;">{{ $order->jumlah_orang }}</td>
                        <td style="border: 1px solid #ddd; padding: 8px; text-align: right;">Rp {{ number_format($order->paketWisata->harga, 0, ',', '.') }}</td>
                        <td style="border: 1px solid #ddd; padding: 8px; text-align: right;">Rp {{ number_format($order->total_harga, 0, ',', '.') }}</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" style="border: 1px solid #ddd; padding: 8px; text-align: right;">Total:</td>
                        <td style="border: 1px solid #ddd; padding: 8px; text-align: right;">Rp {{ number_format($order->total_harga, 0, ',', '.') }}</td>
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
    </div>
</body>
</html>
