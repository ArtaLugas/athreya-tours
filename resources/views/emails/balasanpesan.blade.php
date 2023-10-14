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
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007BFF;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }
        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Balasan Pesan Anda</h1>
        <p>Terima kasih atas pesan Anda. Berikut adalah balasan atas pesan yang Anda kirimkan:</p>
        <p>{!! $pesanBalasan !!}</p>
        <p>Terima kasih atas kerjasama Anda!</p>
        <a class="button" href="#">Lihat Pesan</a>
    </div>
</body>
</html>
