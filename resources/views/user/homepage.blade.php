@extends('user.layouts.template')
@section('title')
    Athreya Tours
@endsection
@section('content')
    <style>
        .hero-section {
        background-image: url('{{ asset('user/assets/images/bg-img.jpg') }}');
        background-size: cover;
        background-position: center;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        }

        .hero-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
        max-width: 1200px;
        }

        .left-content {
        text-align: center;
        color: #fff; /* Warna teks */
        padding: 20px;
        }

        .right-content {
        padding: 20px;
        width: 40%; /* Sesuaikan lebar konten kanan sesuai kebutuhan */
        }

        h1 {
        font-size: 36px;
        margin-bottom: 20px;
        font-weight: 700;
        }

        p {
        font-size: 16px;
        margin-bottom: 30px;
        }

        .btn {
        display: inline-block;
        background-color: #ff6600; /* Warna latar belakang tombol */
        color: #fff; /* Warna teks tombol */
        padding: 15px 30px;
        border-radius: 5px;
        text-decoration: none;
        font-weight: 700;
        letter-spacing: 1px;
        transition: background-color 0.3s;
        }

        .btn:hover {
        background-color: #e55300; /* Warna latar belakang tombol saat hover */
        }

        /* Style untuk bagian "Tentang Kami" */
        .about-us-section {
            padding: 80px 0;
            background-color: #fff; /* Ganti dengan warna latar belakang yang Anda inginkan */
        }

        .about-us-section .h5 {
            color: #28a745; /* Warna teks judul "Overview" */
        }

        .about-us-section h2 {
            font-weight: 700;
            margin-bottom: 15px;
            color: #333; /* Warna teks judul "Biro Tour Athreya" */
        }

        .about-us-section p {
            margin-bottom: 15px;
            color: #666; /* Warna teks isi paragraf */
        }

        /* Style untuk gambar pada bagian "Tentang Kami" */
        .about-us-section img {
            width: 100%; /* Gambar mengisi lebar kontainer */
            height: auto; /* Menjaga rasio aspek gambar */
            max-height: 500px; /* Batasan tinggi maksimum gambar */
            object-fit: cover; /* Gambar mengisi kontainer tanpa mengubah rasio aspek */
        }

        /* Gaya untuk judul "Paket Wisata" */
        .judul-paket-wisata {
            color: #000; /* Warna teks untuk judul paket wisata (misalnya, hitam) */
            font-size: 24px; /* Ukuran font sesuaikan dengan preferensi Anda */
            font-weight: bold; /* Gaya huruf tebal jika diperlukan */
            margin-bottom: 20px;     /* Sesuaikan spasi antara judul dan kartu */
        }

        /* Gaya untuk judul "Biro Wisata Athreya Tour" dengan warna orange */
        .judul-biro-wisata {
            color: #ff6600; /* Warna teks untuk judul biro wisata Athreya Tour (misalnya, orange) */
            font-size: 24px; /* Ukuran font sesuaikan dengan preferensi Anda */
            font-weight: bold; /* Gaya huruf tebal jika diperlukan */
            margin-bottom: 20px; /* Sesuaikan spasi antara judul dan kartu */
        }


        .package-list-section {
            padding: 80px 0;
            background-color: #f9f9f9;
        }

        .package-card {
            background-color: #fff;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            overflow: hidden;
            transition: transform 0.3s;
            margin: 20px;
            position: relative;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
        }

        .package-card:hover {
            transform: scale(1.03);
        }

        .package-card img {
            width: 100%;
            max-height: 200px;
            object-fit: cover;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }

        .package-details {
            padding: 20px;
        }

        .package-details h3 {
            font-size: 24px;
            margin: 0;
            color: #333;
        }

        .package-details p {
            color: #888;
            margin: 5px 0;
        }

        .package-details .fas {
            color: #f39c12;
            margin-right: 5px;
        }

        .btn-primary {
            background-color: #f39c12;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #e68a0d;
        }

        /* Gaya untuk tombol Lihat Semua Paket dengan kelas lihat-semua-paket */
        .btn.lihat-semua-paket {
            background-color: #ff6600; /* Warna latar belakang */
            color: #fff; /* Warna teks */
            border: none;
            padding: 10px 20px; /* Sesuaikan dengan ukuran yang diinginkan */
            border-radius: 5px; /* Gaya sudut tombol */
            text-decoration: none; /* Hilangkan garis bawah pada tautan */
            font-weight: bold; /* Gaya huruf tebal */
            transition: background-color 0.3s ease; /* Transisi saat mengarahkan kursor */
        }

        /* Gaya saat mengarahkan kursor ke tombol */
        .btn.lihat-semua-paket:hover {
            background-color: #ff4400; /* Warna latar belakang saat mengarahkan kursor */
        }
    </style>
    <section class="hero-section">
        <div class="hero-content">
            <div class="left-content">
            <h1>Selamat Datang di Athreya Tours</h1>
            <p>Menyediakan Pengalaman Wisata Terbaik</p>
            <a href="{{ route('paketwisata') }}" class="btn btn-primary">Jelajahi</a>
            </div>
            <div class="right-content">
            <img src="{{ asset('user/assets/images/travel_ullu.png') }}" alt="Ilustrasi Perusahaan" />
            </div>
        </div>
    </section>
    <section class="about-us-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="h5 text-success">Tentang Kami</div>
                    <h2 class="h2 fw-bold mb-3">Biro Tour Athreya</h2>
                    @if ($aboutUsData && isset($aboutUsData->content))
                        <p>{{ $aboutUsData->content }}</p>
                    @else
                        <p>Data About Us tidak tersedia.</p>
                    @endif
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset('user/assets/images/about-img.png') }}" style="width:100%; height:auto; max-height:500px; object-fit:cover;" alt="Tentang Kami">
                </div>
            </div>
        </div>
    </section>
    <section class="package-list-section wf100 p80 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h4 class="judul-biro-wisata">Biro Wisata Athreya Tour</h4>
                    <h2 class="judul-paket-wisata">Paket Wisata</h2>
                </div>
                @foreach($paketWisata as $paket)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="package-card">
                        @if ($paket->foto_wisata)
                            <img src="{{ asset('uploads/paketWisata/' . $paket->foto_wisata) }}" alt="{{ $paket->nama_paket }}" class="img-fluid">
                        @else
                            Tidak Ada Foto
                        @endif
                        <div class="package-details">
                            <h3>{{ $paket->nama_paket }}</h3>
                            <p><i class="fas fa-map-marker-alt"></i> {{ $paket->lokasi_wisata }}</p>
                            <p><i class="fas fa-dollar-sign"></i>Rp {{  number_format($paket->harga, 0, ',' , '.')  }}</p>
                            <a href="{{ route('detailpaketwisata', $paket->id) }}" class="btn btn-primary">Lihat Detail</a>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="col-lg-12 text-center">
                    <a href="" class="btn btn-primary lihat-semua-paket">Lihat Semua Paket Wisata</a>
                </div>
            </div>
        </div>
    </section>
@endsection