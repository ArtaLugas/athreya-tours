@extends('admin.layouts.template')
@section('title')
Tambah Paket Wisata | Athreya Tours
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="py-3 mb-4"><span class="text-muted fw-light">Page/</span> Tambah Paket Wisata</h4>
  <div class="row">
    <div class="col-xxl">
      <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
          <h5 class="mb-0">Tambah Paket Wisata</h5>
          <small class="text-muted float-end">Masukkan Data Kamu</small>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
          @foreach ($errors->all() as $error)
          <p>{{ $error }}</p>
          @endforeach
        </div>
        @endif
        <div class="card-body">
          <form action="{{ route('storepaketwisata') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="nama_paket">Nama Paket:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="nama_paket" name="nama_paket" placeholder="Masukkan Nama Paket" required />
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="deskripsi">Deskripsi:</label>
              <div class="col-sm-10">
                <textarea class="form-control" name="deskripsi" id="deskripsi" rows="4" placeholder="Masukkan Deskripsi Paket Wisata" required></textarea>
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="harga">Harga (RP):</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" id="harga" name="harga" placeholder="2000000" required>
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="lokasi_wisata">Lokasi wisata:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="lokasi_wisata" name="lokasi_wisata" placeholder="Bali, Indonesia" required />
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="durasi">Durasi (Hari):</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" id="durasi" name="durasi" placeholder="3" required />
              </div>
            </div>
            <div class="row mb-3">
              <label for="minimum_peserta" class="col-sm-2 col-form-label">Minimum Peserta:</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" name="minimum_peserta" id="minimum_peserta" required>
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="foto_wisata">Foto:</label>
              <div class="col-sm-10">
                <input type="file" class="form-control" name="foto_wisata[]" id="foto_wisata" multiple required>
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="tanggal_mulai">Tanggal Mulai:</label>
              <div class="col-sm-10">
                <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" required />
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="tanggal_berakhir">Tanggal Berakhir:</label>
              <div class="col-sm-10">
                <input type="date" class="form-control" id="tanggal_berakhir" name="tanggal_berakhir" readonly />
              </div>
            </div>
            <div class="row justify-content-end">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
<script>
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