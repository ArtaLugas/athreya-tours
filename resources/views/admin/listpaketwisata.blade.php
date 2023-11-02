@extends('admin.layouts.template')
@section('title')
    List Paket Wisata | Athreya Tours
@endsection
@section('content')
    <style>
        /* Container untuk setiap slider */
        .image-slider {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 10px 0;
        }

        /* Container untuk gambar dan kontrol slider */
        .slider-wrapper {
            position: relative;
            overflow: hidden; /* Menggunakan overflow untuk efek transisi */
        }

        .slider-image {
            max-width: 200px;
            max-height: 200px;
            width: auto;
            height: auto;
            object-fit: contain;
            transition: transform 0.5s, opacity 0.5s, border 0.5s; /* Efek transisi dengan transform, opacity, dan border */
            opacity: 1; /* Mulai dengan opacity penuh */
            transform: scale(1); /* Mulai dengan transform normal */
            border: 2px solid transparent; /* Tambahkan border */
        }

        .slider-controls {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 200px;
            margin-top: 10px;
        }

        /* Gaya tombol "Prev" dan "Next" */
        .prev,
        .next {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .prev:hover,
        .next:hover {
            background-color: #2980b9;
        }

        /* Teks "Tidak ada gambar" */
        span {
            color: #999;
        }

    </style>

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Page/</span> List Paket Wisata</h4>
        <div class="row">
            <div class="card">
                <h5 class="card-header">Tabel Paket Wisata</h5>
                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                    <div class="table-responsive text-nowrap">
                        <table class="table table-bordered table-hover">
                            <thead class="table-dark text-center">
                                <tr>
                                    <th class="text-white">No.</th>
                                    <th class="text-white">Nama Paket</th>
                                    <th class="text-white">Deskripsi</th>
                                    <th class="text-white">Harga (Rp)</th>
                                    <th class="text-white">Lokasi Wisata</th>
                                    <th class="text-white">Durasi (hari)</th>
                                    <th class="text-white">Tanggal Mulai</th>
                                    <th class="text-white">Tanggal Berakhir</th>
                                    <th class="text-white">Foto Wisata</th>
                                    <th class="text-white">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($paketwisata as $key => $paket)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $paket->nama_paket }}</td>
                                        <td>{{ $paket->deskripsi }}</td>
                                        <td>Rp {{ number_format($paket->harga, 0, ',', '.') }}</td>
                                        <td>{{ $paket->lokasi_wisata }}</td>
                                        <td>{{ $paket->durasi }}</td>
                                        <td>{{ $paket->tanggal_mulai }}</td>
                                        <td>{{ $paket->tanggal_berakhir }}</td>
                                        <td>
                                            @if ($paket->foto_wisata)
                                                <div class="image-slider" data-index="{{ $loop->index }}">
                                                    <div class="slider-wrapper">
                                                        @foreach (json_decode($paket->foto_wisata) as $index => $image)
                                                        <img src="{{ asset('uploads/paketWisata/' . $image) }}"
                                                            style="max-width: 200px; max-height: 200px; @if ($index !== 0) display: none; @endif"
                                                            alt="{{ $paket->nama_paket }}" class="slider-image">
                                                        @endforeach
                                                        <div class="slider-controls">
                                                            <button class="prev" data-index="{{ $loop->index }}" onclick="plusSlides(-1, this)">Prev</button>
                                                            <button class="next" data-index="{{ $loop->index }}" onclick="plusSlides(1, this)">Next</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                <span>Tidak ada gambar</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('editpaketwisata', $paket->id) }}" class="btn btn-sm btn-warning mx-1">Edit</a>
                                                <form action="{{ route('deletepaketwisata', $paket->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus paket wisata ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger mx-1" onclick="return confirm('Anda yakin ingin menghapus paket wisata ini?')">Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function plusSlides(n, button) {
            const index = button.getAttribute('data-index');
            const images = document.querySelectorAll('.image-slider[data-index="' + index + '"] .slider-image');
            let currentIndex = 0;

            for (let i = 0; i < images.length; i++) {
                if (images[i].style.display !== 'none') {
                    currentIndex = i;
                    break;
                }
            }

            let newIndex = (currentIndex + n + images.length) % images.length;
            images[currentIndex].style.display = 'none';
            images[newIndex].style.display = 'block';
        }
    </script>

@endsection
