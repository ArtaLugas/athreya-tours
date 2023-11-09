@extends('admin.layouts.template')
@section('title')
Dashboard | Athreya Tours
@endsection
@section('content')
@push('css')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endpush
<style>
    .info-box {
        background: #fff;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 15px;
        text-align: center;
        margin-bottom: 20px;
        transition: transform 0.2s;
    }

    .info-box:hover {
        transform: translateY(-5px);
    }

    .info-box-icon {
        font-size: 2rem;
        display: block;
    }

    .info-box-content {
        padding-top: 10px;
    }

    .info-box-text {
        font-size: 18px;
        font-weight: 500;
    }

    .info-box-number {
        font-size: 24px;
        font-weight: 600;
        margin-top: 5px;
    }

    .bg-info {
        background: #17a2b8;
        color: #fff;
    }

    .bg-success {
        background: #28a745;
        color: #fff;
    }

    .bg-warning {
        background: #007bff;
        color: #fff;
    }

    .bg-danger {
        background: #dc3545;
        color: #fff;
    }

    form {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 20px;
    }

    label {
        font-weight: bold;
    }

    select {
        padding: 10px;
        border: 1px solid #ced4da;
        border-radius: 5px;
        font-size: 14px;
    }

    button {
        padding: 10px 15px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 14px;
    }

    button:hover {
        background-color: #0056b3;
    }
</style>
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row justify-content-center">
        <div class="row">
            <div class="col-md-3">
                <div class="info-box bg-info">
                    <span class="info-box-icon bg-info"><i class="fas fa-file-alt"></i></span>
                    <div class="info-box-content">
                        <p class="info-box-text">Jumlah Pesanan</p>
                        <span class="info-box-number">{{ $totalPesanan }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="info-box bg-success">
                    <span class="info-box-icon bg-success"><i class="fas fa-suitcase"></i></span>
                    <div class="info-box-content">
                        <p class="info-box-text">Jumlah Paket Wisata</p>
                        <span class="info-box-number">{{ $totalPaketWisata }}</span>
                    </div>
                </div>

            </div>
            <div class="col-md-3">
                <div class="info-box bg-warning">
                    <span class="info-box-icon bg-warning"><i class="fas fa-info-circle"></i></span>
                    <div class="info-box-content">
                        <p class="info-box-text">Pesan User</p>
                        <span class="info-box-number">{{ $totalPesan }}</span>
                    </div>
                </div>

            </div>
            <div class="col-md-3">
                <div class="info-box bg-danger">
                    <span class="info-box-icon bg-danger"><i class="fas fa-users"></i></span>
                    <div class="info-box-content">
                        <p class="info-box-text">Jumlah User</p>
                        <span class="info-box-number">{{ $totalUsers }}</span>
                    </div>
                </div>
            </div>
            <div class="card">
                <h5 class="card-header">Laporan Pesanan</h5>
                <div class="card-body">
                    <form action="{{ route('admindashboard') }}" method="GET">
                        @csrf
                        <label for="sortFilter">Filter:</label>
                        <select name="sortFilter" id="sortFilter" class="form-control">
                            <option value="all">Semua Waktu</option>
                            <option value="today">Hari Ini</option>
                            <option value="week">Minggu Ini</option>
                            <option value="month">Bulan Ini</option>
                            <option value="year">Tahun Ini</option>
                        </select>
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </form>
                    @if ($totalPemasukan > 0)
                    <a href="{{ route('downloadPDF') }}" class="mb-3 btn btn-success" download="laporan_pemasukan.pdf">Unduh PDF</a>
                    @endif
                    <div class="table-responsive text-nowrap">
                        <table class="table table-bordered table-hover">
                            <thead class="table-dark text-center">
                                <tr>
                                    <th class="text-white">No.</th>
                                    <th class="text-white">Nama Paket Wisata</th>
                                    <th class="text-white">Jumlah Pesanan</th>
                                    <th class="text-white">Jumlah Peserta</th>
                                    <th class="text-white">Pemasukan</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @forelse($dataPesanan as $index => $pesanan)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $pesanan->paketWisata->nama_paket }}</td>
                                    <td>{{ $pesanan->jumlah_pesanan }}</td>
                                    <td>{{ $pesanan->jumlah_orang }}</td>
                                    <td>Rp {{ number_format($pesanan->total_harga_pesanan, 2, ',', '.') }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5">Pesanan Tidak Ada Pada Rentang Waktu.</td>
                                </tr>
                                @endforelse
                                @if ($totalPemasukan>0)
                                <tr>
                                    <td colspan="4">Total Pemasukan</td>
                                    <td><strong>Rp {{ number_format($totalPemasukan, 2, ',', '.') }}</strong></td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection