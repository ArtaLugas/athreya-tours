@extends('admin.layouts.template')
@section('title')
Edit Paket Wisata | Athreya Tours
@endsection
@section('content')
<style>
  .slider-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    max-width: 100%;
    margin: 0 auto;
  }

  /* CSS untuk image slider */
  .image-slider {
    display: flex;
    flex-direction: column;
    align-items: center;
    max-width: 100%;
    overflow: hidden;
  }

  /* CSS untuk gambar dalam slider */
  .slider-image {
    max-width: 100%;
    max-height: 200px;
    width: auto;
    height: auto;
    object-fit: contain;
  }

  /* CSS untuk slider controls */
  .slider-controls {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 10px;
  }

  /* Gaya untuk tombol "prev" dan "next" */
  .prev,
  .next {
    font-size: 24px;
    cursor: pointer;
    margin: 0 10px;
  }

  /* Gaya saat mouse diarahkan ke tombol "prev" dan "next" */
  .prev:hover,
  .next:hover {
    color: darkorange;
  }

  button {
    margin-right: 20px;
  }
</style>
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="py-3 mb-4"><span class="text-muted fw-light">Page/</span> Edit Paket Wisata</h4>

  <!-- Basic Layout & Basic with Icons -->
  <div class="row">
    <!-- Basic Layout -->
    <div class="col-xxl">
      <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
          <h5 class="mb-0">Edit Paket Wisata</h5>
          <small class="text-muted float-end">Masukkan Data Kamu</small>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
        <div class="card-body">
          <form action="{{ route('updatepaketwisata', $paket->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="nama_paket">Nama Paket:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="nama_paket" name="nama_paket" value="{{ $paket->nama_paket }}" required />
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="deskripsi">Deskripsi:</label>
              <div class="col-sm-10">
                <textarea class="form-control" name="deskripsi" id="deskripsi" rows="4" required>{{ $paket->deskripsi }}</textarea>
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="harga">Harga (RP):</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" id="harga" name="harga" value="{{ $paket->harga }}" required>
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="lokasi_wisata">Lokasi wisata:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="lokasi_wisata" name="lokasi_wisata" value="{{ $paket->lokasi_wisata }}" required />
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="durasi">Durasi (Hari):</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" id="durasi" name="durasi" value="{{ $paket->durasi }}" required />
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="foto_wisata">Foto:</label>
              <div class="col-lg-6">
                <div class="slider-container">
                  @if ($paket->foto_wisata)
                  <div class="image-slider">
                    <div class="slider-wrapper">
                      @foreach (json_decode($paket->foto_wisata) as $image)
                      <img src="{{ asset('uploads/paketWisata/' . $image) }}" style="max-width: 200px; max-height: 200px;" alt="{{ $paket->nama_paket }}" class="slider-image">
                      @endforeach
                    </div>
                  </div>
                  <div class="slider-controls">
                    <div class="prev" onclick="plusSlides(-1)">
                      <i class='bx bx-chevron-left'></i>
                    </div>
                    <div class="next" onclick="plusSlides(1)">
                      <i class='bx bx-chevron-right'></i>
                    </div>
                  </div>
                  @else
                  <span>Tidak ada gambar</span>
                  @endif
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <label for="foto_wisata" class="col-sm-2 col-form-label">Ubah Foto:</label>
              <div class="col-sm-10">
                <input type="file" class="form-control mt-2" name="foto_wisata[]" id="foto_wisata" multiple>
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="tanggal_mulai">Tanggal Mulai:</label>
              <div class="col-sm-10">
                <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" value="{{ $paket->tanggal_mulai }}" required />
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="tanggal_berakhir">Tanggal Berakhir:</label>
              <div class="col-sm-10">
                <input type="date" class="form-control" id="tanggal_berakhir" name="tanggal_berakhir" value="{{ $paket->tanggal_berakhir }}" readonly />
              </div>
            </div>
            <div class="row justify-content-end">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="{{ route('listpaketwisata')}}" class="btn btn-warning">Batal</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  let slideIndex = 0;
  const slides = document.querySelectorAll(".slider-image"); // Mendefinisikan slides di luar fungsi

  showSlides(slideIndex);

  function showSlides(index) {
    if (slides.length === 0) return;

    slides.forEach((slide, i) => {
      if (i === index) {
        slide.style.display = "block";
      } else {
        slide.style.display = "none";
      }
    });
    slideIndex = index;
  }

  function plusSlides(n) {
    slideIndex += n;
    if (slideIndex < 0) {
      slideIndex = slides.length - 1;
    }
    if (slideIndex >= slides.length) {
      slideIndex = 0;
    }
    showSlides(slideIndex);
  }
  // Fungsi untuk menghitung tanggal berakhir
  function hitungTanggalBerakhir() {
    const tanggalMulai = new Date(document.getElementById('tanggal_mulai').value);
    const durasi = parseInt(document.getElementById('durasi').value);
    if (!isNaN(durasi) && !isNaN(tanggalMulai.getTime())) {
      const tanggalBerakhir = new Date(tanggalMulai);
      tanggalBerakhir.setDate(tanggalBerakhir.getDate() + durasi);
      const formattedDate = tanggalBerakhir.toISOString().split('T')[0];
      document.getElementById('tanggal_berakhir').value = formattedDate;
    }
  }

  // Event listener untuk input durasi dan tanggal mulai
  document.getElementById('durasi').addEventListener('input', hitungTanggalBerakhir);
  document.getElementById('tanggal_mulai').addEventListener('input', hitungTanggalBerakhir);
</script>
@endsection