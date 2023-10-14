@extends('admin.layouts.template')
@section('title')
    Edit Paket Wisata | Athreya Tours
@endsection
@section('content')
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
                            <input type="text" class="form-control" id="nama_paket" name="nama_paket" value="{{ $paket->nama_paket }}" required/>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="deskripsi">Deskripsi:</label>
                          <div class="col-sm-10">
                            <textarea class="form-control" name="deskripsi" id="deskripsi" rows="4"required>{{ $paket->deskripsi }}</textarea>
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
                            <input type="text" class="form-control" id="lokasi_wisata" name="lokasi_wisata" value="{{ $paket->lokasi_wisata }}" required/>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="durasi">Durasi (Hari):</label>
                          <div class="col-sm-10">
                            <input type="number" class="form-control" id="durasi" name="durasi" value="{{ $paket->durasi }}" required/>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="foto_wisata">Foto:</label>
                          <div class="col-sm-10">
                            @if ($paket->foto_wisata)
                                <img src="{{ asset('uploads/paketWisata/' .$paket->foto_wisata) }}" style="max-width: 100px" alt="{{ $paket->nama_paket }}">
                            @else
                            <span>Tidak ada gambar</span>
                            @endif
                            <input type="file" class="form-control mt-2" name="foto_wisata" id="foto_wisata">
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="tanggal_mulai">Tanggal Mulai:</label>
                          <div class="col-sm-10">
                            <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" value="{{ $paket->tanggal_mulai }}" required/>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="tanggal_berakhir">Tanggal Berakhir:</label>
                          <div class="col-sm-10">
                            <input type="date" class="form-control" id="tanggal_berakhir" name="tanggal_berakhir" value="{{ $paket->tanggal_berakhir }}" readonly/>
                          </div>
                        </div>
                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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