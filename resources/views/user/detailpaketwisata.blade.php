@extends('user.layouts.template')
@section('title')
    Detail Paket Wisata Athreya Tours
@endsection
@section('content')
    @push('css')
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    @endpush
    <style>
        /* CSS untuk desain halaman detail paket wisata */
        .header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        /* CSS untuk tampilan form pemesanan */
        .modal-content {
            border: none;
            border-radius: 10px;
        }

        .modal-header {
            background-color: #333;
            color: #fff;
        }

        .modal-title {
            font-weight: bold;
        }

        .modal-footer {
            border-top: none;
        }

        .package-card {
            background: #fff; /* Warna latar belakang kartu */
            padding: 20px; /* Ruang dalam kartu */
            margin-right: 40px;
            margin-top: 40px;
            margin-bottom: 40px; /* Margin antara setiap kartu */
            border: 1px solid #ddd; /* Garis tepi kartu */
            border-radius: 10px; /* Sudut melengkung kartu */
        }


        .package-card h4{
            color:orange;
        }

        .package-card p {
            font-family: 'Arial', sans-serif; /* Pilih font yang sesuai */
            font-size: 16px; /* Ukuran font */
            color: #333; /* Warna teks */
            line-height: 1.4; /* Jarak antar baris */
            text-align: justify; /* Ratakan teks */
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2); /* Bayangan teks */
            margin: 10px 0; /* Ruang antara paragraf */
            /* Hiasan tambahan seperti efek hover atau transisi (opsional) */
        }

        /* Gaya saat mouse diarahkan ke kartu */
        .package-card:hover {
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2); /* Efek bayangan saat hover */
            transform: translateY(-2px); /* Efek naik saat hover */
            /* Gaya lainnya untuk efek hover (opsional) */
        }

        .btn-custom {
            background-color: orange;
            border-color: orange;
            color: #fff; /* Teks putih */
            transition: background-color 0.3s;
        }

        /* Hover state untuk tombol "btn-custom" */
        .btn-custom:hover {
            background-color: darkorange; /* Warna oranye yang lebih gelap saat dihover */
            border-color: darkorange;
        }

        /* CSS untuk input jumlah orang dan total harga */
        .form-control {
            border-radius: 5px;
            margin-bottom: 10px;
        }

        /* CSS untuk judul dan subjudul */
        h2 {
            font-size: 2rem;
            margin-top: 20px;
            text-align: center;
            margin-bottom: 20px;
            color: orange;
        }

        h3 {
            font-size: 1.5rem;
            margin-top: 20px;
        }

        h4 {
            font-size: 1.25rem;
            margin-top: 20px;
        }

        .col-md-2 {
            margin-bottom: 40px; /* Jarak antar kolom */
            padding: 10px; /* Ruang dalam kolom */
            background: #fff; /* Warna latar belakang */
            margin-top:40px;
            border: 1px solid #e0e0e0; /* Border */
            border-radius: 5px; /* Sudut border membulat */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Bayangan halus */
            transition: transform 0.3s; /* Animasi ketika hover */

            /* Lebar dan tinggi kolom */
            width: 100%;
            height: auto;
        }

        /* Hover efek */
        .col-md-2:hover {
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2); /* Efek bayangan saat hover */
            transform: translateY(-2px);
        }

        .package-card-small {
            padding: 10px; /* Ruang dalam package-card-small */
            background: #fff; /* Warna latar belakang */
            border: 1px solid #e0e0e0; /* Border */
            border-radius: 5px; /* Sudut border membulat */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Bayangan halus */
            transition: transform 0.3s, text-decoration 0.3s; /* Animasi ketika hover */

            /* Lebar dan tinggi package-card-small */
            width: 100%;
            height: auto;
        }

        /* Hover efek */
        .package-card-small:hover {
        }

        .package-card-small a {
            text-decoration: none;
        }

        /* Teks judul paket wisata */
        .package-card-small h3 {
            font-size: 16px;
            font-weight: bold;
        }

        /* Teks lokasi dan harga */
        .package-card-small p {
            font-size: 14px;
            color: #888;
        }

        /* Teks harga */
        .package-card-small p i {
            color: #f76d57;
        }

    </style>
    <section class="p-5">
        <header class="header">
            <div class="header-content">
                <h1>Detail Package Tour</h1>
            </div>
        </header>
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <div class="package-card">
                        <h2>{{ $paketWisata->nama_paket }}</h2>
                        @if (session('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif
                        <img src="{{ asset('uploads/paketWisata/'.$paketWisata->foto_wisata) }}" alt="{{ $paketWisata->nama_paket }}" class="img-fluid">
                        <h4>Deskripsi:</h4>
                        <p>{{ $paketWisata->deskripsi }}</p>
                        <h4>Lokasi:</h4>
                        <p>{{ $paketWisata->lokasi_wisata }}</p>
                        <h4>Harga:</h4>
                        <p>Rp {{  number_format($paketWisata->harga, 0, ',' , '.')  }}</p>
                        <h4>Waktu: </h4>
                        <p>{{ $paketWisata->durasi }} Hari</p>
                        <h4>Tanggal: </h4>
                        <p>{{ $paketWisata->tanggal_mulai }} sampai {{ $paketWisata->tanggal_berakhir }}</p>
                        <button type="button" class="btn btn-custom" data-toggle="modal" data-target="#pesanModal">Pesan</button>
                    </div>
                </div>
                <div class="col-md-2">
                    <h4>Paket Wisata Lainnya</h4>
                    <div class="row">
                        @foreach($paketWisataLainnya as $paketLainnya)
                            <div class="col-md-12">
                                <div class="package-card-small">
                                    <a href="{{ route('detailpaketwisata', $paketLainnya->id) }}" class="package-card-link">
                                        <img src="{{ asset('uploads/paketWisata/' . $paketLainnya->foto_wisata) }}" alt="{{ $paketLainnya->nama_paket }}" class="img-fluid">
                                        <div class="package-details">
                                            <h3>{{ $paketLainnya->nama_paket }}</h3>
                                            <p><i class="fas fa-map-marker-alt"></i> {{ $paketLainnya->lokasi_wisata }}</p>
                                            <p><i class="fas fa-dollar-sign"></i> {{ $paketLainnya->harga }}</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="pesanModal" tabindex="-1" role="dialog" aria-labelledby="pesanModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="pesanModalLabel">Form Pemesanan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('storepemesanan') }}" method="POST">
                            @csrf
                            <input type="hidden" name="paket_wisata_id" value="{{ $paketWisata->id }}">
                            <div class="form-group">
                                <label for="jumlah_orang">Jumlah Orang:</label>
                                <input type="number" name="jumlah_orang" id="jumlah_orang" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="total_harga">Total Harga:</label>
                                <input type="number" name="total_harga" id="total_harga" class="form-control" required readonly>
                            </div>
                            <!-- Anda bisa menambahkan input lain sesuai kebutuhan -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        // Efek animasi pada tombol "Pesan"
        document.querySelector(".btn-primary").addEventListener("mouseenter", function () {
            this.style.transform = "scale(1.1)";
        });

        document.querySelector(".btn-primary").addEventListener("mouseleave", function () {
            this.style.transform = "scale(1)";
        });

        document.getElementById('jumlah_orang').addEventListener('input', function() {
            var jumlahOrang = parseInt(this.value);
            var hargaPaket = {{ $paketWisata->harga }}; // Harga dari data paket wisata
            var totalHarga = jumlahOrang * hargaPaket;
            document.getElementById('total_harga').value = totalHarga;
        });
    </script>
    @push('script')
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    @endpush
@endsection