<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Balasan Pesan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .container {
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
        }

        p {
            color: #555;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Balasan Pesan Anda</h1>
        <p>Pesan yang anda kirim:</p>
        <p>{!! $pesanUser !!}</p>
        <p>Terima kasih atas pesan Anda. Berikut adalah balasan atas pesan yang Anda kirimkan:</p>
        <p>{!! $pesanBalasan !!}</p>
        <p>Terima kasih atas kerjasama Anda!</p>
        <h3>Informasi Kontak</h3>
        <p>Jika Anda memiliki pertanyaan atau butuh bantuan, silakan hubungi kami melalui:</p>
        <p>Email: athreyatours.id@gmail.com</p>
        <p>Telepon: +62 812-2644-8469</p>
    </div>
</body>

</html>