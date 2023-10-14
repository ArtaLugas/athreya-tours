@extends('user.layouts.template')
@section('title')
    Tentang Kami
@endsection
@section('content')
    <style>
        
        .header {
            background-color: #333; /* Warna latar belakang header */
            color: #fff; /* Warna teks header */
            padding: 20px;
            text-align: center;
        }

        /* CSS untuk kartu dengan bayangan */
        .card {
            background-color: #fff; /* Warna latar belakang kartu */
            border-radius: 10px; /* Sudut bulat pada kartu */
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); /* Bayangan kartu */
            padding: 20px;
            margin: 20px;
        }

        .main-content {
            padding: 50px 0;
            text-align: center;
        }

        .container-aboutus {
            max-width: 1200px;
            margin: 0 auto;
        }

        h2 {
            font-size: 36px;
            margin-bottom: 20px;
            color: #FF4500; /* Warna oranye terang */
        }

        p {
            font-size: 18px;
            line-height: 1.6;
        }

        .footer {
            text-align: center;
            padding: 20px 0;
        }
    </style>
    <section class="pt-3">
        <header class="header">
        <div class="header-content">
            <h1>About Us</h1>
        </div>
        </header>
        <main class="main-content">
            <div class="container-aboutus">
                <!-- Konten "About Us" dalam kartu -->
                <div class="card">
                    @if ($aboutUsData)
                        @if ($aboutUsData->status === 'aktif')
                            <h2>Athreya Tours</h2>
                            <p>{{ $aboutUsData->content }}</p>
                        @else
                        <p>Mohon maaf, konten Tentang Kami tidak tersedia saat ini.</p>
                        @endif
                    @else
                        <p>Mohon maaf, konten Tentang Kami tidak tersedia saat ini.</p>    
                    @endif
                </div>
            </div>
        </main>
    </section>
@endsection