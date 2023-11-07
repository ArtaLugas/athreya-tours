@extends('admin.layouts.template')
@section('title')
Dashboard | Athreya Tours
@endsection
@section('content')
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
        </div>
    </div>
</div>
@endsection