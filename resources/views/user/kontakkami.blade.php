@extends('user.layouts.template')
@section('title')
    Kontak Kami
@endsection
@section('content')
    <style>
        .header {
            background-color: #333; /* Warna latar belakang header */
            color: #fff; /* Warna teks header */
            padding: 20px;
            text-align: center;
        }

        .main-content {
            padding: 50px 0;
            text-align: center;
        }

        .custom-container {
            max-width: 1200px; /* Lebar maksimum container */
            margin: 0 auto; /* Membuat container berada di tengah */
            padding: 20px; /* Padding di dalam container */
            background-color: #fff; /* Warna latar belakang container */
            border: 1px solid #e0e0e0; /* Border container */
            border-radius: 5px; /* Sudut bulat container */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Bayangan container */
        }

        .contact-card h2 {
            color: #333;
            font-size: 24px;
        }

        /* CSS untuk formulir kontak */
        .contact-form {
            background-color: #f5f5f5;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        /* Warna teks dalam formulir */
        .contact-form label, .contact-form input[type="text"], .contact-form input[type="email"], .contact-form textarea {
            color: #333;
        }

        .contact-form .btn{
            background-color: #ff6600;
            border: none; 
            border-radius: 5px;
        }

        /* Hover pada tombol kirim pesan */
        .contact-form .btn:hover {
            background-color: #da5802;
        }

        /* CSS untuk elemen iframe (contoh: peta) */
        .contact-card iframe {
            width: 100%;
            height: 550px;
        }

        .contact-title {
            color: #ff6600; /* Warna oranye */
            font-weight: bold;
            margin-bottom: 10px; /* Membuat jarak antara judul dan isi */
        }

        a {
            text-decoration: none; /* Menghilangkan garis bawah bawaan */
            color: #ff6600; /* Warna teks hyperlink (oranye) */
        }

        /* Hover effect saat kursor diarahkan ke hyperlink */
        a:hover {
            text-decoration: underline; /* Garis bawah saat dihover */
            color: #da5802; /* Warna teks hyperlink saat dihover (oranye lebih tua) */
        }
    </style>
    <section class="pt-3">
        <header class="header">
            <div class="header-content">
                <h1>Kontak Kami</h1>
            </div>
        </header>
        <main class="main-content">
            <div class="custom-container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="contact-card">
                            <h2>Kontak Kami</h2>
                            <p class="pt-3">Silakan hubungi kami jika Anda memiliki pertanyaan atau masukan.</p>
                            <div class="contact-form">
                                @if (session('message'))
                                    <div class="alert alert-success">
                                        {{ session('message') }}
                                    </div>
                                @endif
                                <form method="POST" action="{{ route('storekontakkami') }}">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Nama" required>
                                    </div>

                                    <div class="form-group mb-3">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                                    </div>

                                    <div class="form-group mb-3">
                                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Nomor Telefon" required>
                                    </div>

                                    <div class="form-group mb-3">
                                        <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>
                                    </div>

                                    <div class="form-group mb-3">
                                        <textarea class="form-control" id="message" name="message" rows="5" placeholder="Pesan" required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Kirim Pesan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="contact-card">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15843.623120696331!2d110.6320503!3d-6.9018705!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70eb400085b935%3A0xd38f2c5a6c324617!2sAthreya%20Tours!5e0!3m2!1sen!2sid!4v1697016922000!5m2!1sen!2sid" width="600" height="450" style="border:0;"></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <div style="margin-top: 30px;"></div>
            <div class="custom-container">
                <div class="row">
                    <h2 class="mb-5">Informasi Kontak</h2>
                    <!-- Kartu Alamat -->
                    <div class="col-md-4">
                        <div class="contact-card">
                            <h3 class="contact-title">Alamat:</h3>
                            <p>Lingkungan Kavling No.60, Kel, RT.010/RW.002, Bogorame, Bintoro, Kec. Demak, Kabupaten Demak, Jawa Tengah 59511</p>
                        </div>
                    </div>

                    <!-- Kartu Nomor Telepon -->
                    <div class="col-md-4">
                        <div class="contact-card">
                            <h3 class="contact-title">Nomor Telepon:</h3>
                            <a href="tel:+6281226448469">+62 812-2644-8469</a>
                        </div>
                    </div>

                    <!-- Kartu Email -->
                    <div class="col-md-4">
                        <div class="contact-card">
                            <h3 class="contact-title">Email:</h3>
                            <a href="mailto:athreyatours.id@gmail.com">athreyatours.id@gmail.com</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </section>
@endsection