@extends('user.layouts.template')
@section('title')
    Paket Wisata Athreya Tours
@endsection
@section('content')
    <style>
        .header {
            background-color: #333; /* Warna latar belakang header */
            color: #fff; /* Warna teks header */
            padding: 20px;
            text-align: center;
        }

        /* Filter dan Sort Form */
        form {
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        /* Filter dan Sort Button */
        button.btn-primary {
            background-color: #FFA500; /* Warna oranye */
            color: #fff;
        }

        /* List of Paket Wisata */
        .package-card {
            border: 1px solid #FFA500; /* Warna oranye */
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .package-card:hover {
            transform: translateY(-5px);
        }
        
        .image-slider {
            display: flex;
            overflow: hidden;
        }

        .slider-item {
            width: 300px; /* Atur lebar sesuai dengan kebutuhan Anda */
            height: 200px; /* Atur tinggi sesuai dengan kebutuhan Anda */
            margin-right: 10px; /* Jarak antara gambar */
        }

        .slider-image {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Untuk mempertahankan aspek ratio gambar */
        }

        .package-details h3 {
            font-size: 20px;
            color: black;
            margin: 10px 0;
        }

        .package-details p {
            font-size: 16px;
            color: black; /* Warna oranye */
            margin: 5px 0;
        }

        .package-details i {
            margin-right: 5px;
        }

        .btn-primary {
            background-color: #FFA500; /* Warna oranye */
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-top: 10px;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #FF8000; /* Warna oranye yang lebih terang */
        }

    </style>
    <section class="p-5">
        <header class="header">
            <div class="header-content">
                <h1>Package Tour</h1>
            </div>
        </header>
        <div class="container">
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div
            @endif
            <!-- Sort Form -->
            <form action="{{ route('sortpaketwisata') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="sortType">Sort by:</label>
                    <select name="sortType" id="sortType" class="form-control">
                        <option value="name-asc">Nama (A-Z)</option>
                        <option value="name-desc">Nama (Z-A)</option>
                        <option value="price-asc">Harga (Terendah ke Tertinggi)</option>
                        <option value="price-desc">Harga (Tertinggi ke Terendah)</option>
                        <!-- Tambahkan pilihan sort lainnya -->
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Sort</button>
            </form>

            <!-- List of Paket Wisata -->
            <div class="row">
                @foreach($paketWisata as $paket)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="package-card">
                            <div class="slider-container">
                                @if ($paket->foto_wisata)
                                    @php
                                        $images = json_decode($paket->foto_wisata);
                                    @endphp
                                    @if (count($images)>0)
                                        <div class="image-slider">
                                            @foreach ($images as $image)
                                                <div class="slider-item">
                                                    <img src="{{ asset('uploads/paketWisata/'.$image) }}" alt="{{ $paket->nama_paket }}" class="slider-image">
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                @else
                                    Tidak ada foto
                                @endif
                            </div>
                            <div class="package-details">
                                <h3>{{ $paket->nama_paket }}</h3>
                                <p><i class="fas fa-map-marker-alt"></i> {{ $paket->lokasi_wisata }}</p>
                                <p><i class="fas fa-dollar-sign"></i> Rp.{{ $paket->harga }}</p>
                            </div>
                            <a href="{{ route('detailpaketwisata', $paket->id) }}" class="btn btn-primary">Lihat Detail</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    
    <script>
        // Sort Form
        $('#sort-form').submit(function (e) {
            e.preventDefault();
            const sortType = $('#sortType').val();
            // Kirim permintaan sort menggunakan sortType ke server
            $.ajax({
                type: 'POST',
                url: '{{ route('sortpaketwisata') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    sortType: sortType,
                },
                success: function (data) {
                    $('#paket-wisata-list').html(data);
                }
            });
        });
    </script>
@endsection