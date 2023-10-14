@extends('admin.layouts.template')
@section('title')
    List Paket Wisata | Athreya Tours
@endsection
@section('content')
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
                                    <img src="{{ asset('uploads/paketWisata/' . $paket->foto_wisata) }}" alt="{{ $paket->nama_paket }}" style="max-width: 100px;">
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
@endsection