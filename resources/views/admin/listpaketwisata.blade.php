@extends('admin.layouts.template')
@section('title')
    List Paket Wisata | Athreya Tours
@endsection
@section('content')
    <style>
        /* CSS for the image slider */
        .image-slider {
            display: flex;
            align-items: center;
            overflow: hidden;
            max-width: 100%;
        }

        .slider-image {
            max-width: 100%;
            height: auto;
            margin-right: 10px; /* Adjust the margin as needed */
            transition: transform 0.3s ease; /* Add a smooth transition effect */
        }
        /* CSS for slider-controls */
        .slider-controls {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px; /* Atur sesuai kebutuhan Anda */
        }

        .prev,
        .next {
            background-color: #333; /* Atur warna latar belakang sesuai kebutuhan Anda */
            color: #fff; /* Atur warna teks sesuai kebutuhan Anda */
            padding: 5px 10px;
            border: 1px solid #333; /* Atur border sesuai kebutuhan Anda */
            border-radius: 4px; /* Atur border-radius sesuai kebutuhan Anda */
            cursor: pointer;
        }

        .prev:hover,
        .next:hover {
            background-color: #555; /* Warna latar belakang saat tombol dihover */
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
                                                <div class="image-slider">
                                                    @foreach (json_decode($paket->foto_wisata) as $image)
                                                        <img src="{{ asset('uploads/paketWisata/' . $image) }}" alt="{{ $paket->nama_paket }}" class="slider-image">
                                                    @endforeach
                                                </div>
                                                <div class="slider-controls">
                                                    <div class="prev" onclick="plusSlides(-1)">
                                                        <i class='bx bx-chevron-left' ></i>
                                                    </div>
                                                    <div class="next" onclick="plusSlides(1)">
                                                        <i class='bx bx-chevron-right' ></i>
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
        // JavaScript for the image slider
        let slideIndex = 0;
        showSlides(slideIndex);

        function showSlides(index) {
            const slides = document.querySelectorAll(".slider-image");
            if (slides.length === 0) return; // Tidak ada gambar untuk ditampilkan

            if (index < 0) {
                index = slides.length - 1;
            }
            if (index >= slides.length) {
                index = 0;
            }

            slides.forEach((slide) => {
                slide.style.transform = `translateX(-${index * 100}%)`;
            });
            slideIndex = index; // Atur ulang nilai slideIndex
        }

        function plusSlides(n) {
            slideIndex += n;
            showSlides(slideIndex);
        }
    </script>

@endsection
