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

        .package-list-section {
            background-color: #1d1c1c; /* Ganti dengan warna gelap yang Anda inginkan */
            padding: 50px; /* Atur padding sesuai kebutuhan */
        }


        .package-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .package-card img {
            max-width: 100%;
            max-height: 100%;
            width: auto;
            height: auto;
            object-fit: cover;
        }

        .package-details {
            padding: 20px;
        }

        .package-details h3 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .package-details p {
            font-size: 16px;
            margin: 10px 0;
        }

        .package-details i {
            margin-right: 10px;
        }

        /* Hover effect for the card */
        .package-card:hover {
            transform: scale(1.03);
            transition: transform 0.2s ease;
        }



    </style>
    <section class="hero-section">
        <div class="hero-content">
            <div class="left-content">
            <h1>Selamat Datang di Athreya Tours</h1>
            <p>Menyediakan Pengalaman Wisata Terbaik</p>
            <a href="#" class="btn btn-primary">Jelajahi</a>
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
                    <p>{{ $aboutUsData->content }}</p>
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
                            <p><i class="fas fa-dollar-sign"></i> {{ $paket->harga }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection