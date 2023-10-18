@extends('user.layouts.template')
@section('title')
    Riwayat Pesanan Athreya Tours
@endsection
@section('content')
    <style>
        /* CSS untuk menambahkan border pada tabel riwayat pesanan */

        /* Atur tampilan tabel */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            border: 1px solid #ddd;
            text-align: center;
        }

        /* Gaya header tabel */
        thead {
            background-color: #e87316;
            color: #fff;
            border: 1px solid #e87316; /* Tambahkan border pada header */
        }

        th {
            padding: 12px;
        }

        /* Gaya baris data */
        tbody {
            background-color: #f7f7f7;
        }

        td {
            padding: 10px;
            border: 1px solid #ddd; /* Tambahkan border pada sel data */
        }

        /* Gaya sel yang berisi angka */
        td:first-child {
            font-weight: bold;
        }

        /* Gaya sel yang berisi harga */
        td:nth-child(4) {
            text-align: right;
        }

        table.table tbody td.status-pending {
            color: rgb(255, 136, 0);
            font-weight: bold;
        }

        table.table tbody td.status-ditolak {
            color: red;
            font-weight: bold;
        }

        table.table tbody td.status-diterima {
            color: green;
            font-weight: bold;
        }
    </style>
    <section class="pt-5">
        <div class="container riwayat py-5">
        <h1 class="mb-4">Riwayat Pesanan</h1>
            <div class="row">
                @if ($riwayatPesanan->isEmpty())
                    <p>Anda belum memiliki riwayat pesanan.</p>
                @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID Pesanan</th>
                                <th>Nama Paket Wisata</th>
                                <th>Jumlah Orang</th>
                                <th>Total Harga</th>
                                <th>Status Pesanan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($riwayatPesanan as $pesanan)
                                <tr>
                                    <td>{{ $pesanan->id }}</td>
                                    <td>{{ $pesanan->paketWisata->nama_paket }}</td>
                                    <td>{{ $pesanan->jumlah_orang }}</td>
                                    <td>Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</td>
                                    <td class="status-{{ strtolower($pesanan->status_pesanan) }}">
                                        {{ $pesanan->status_pesanan }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </section>
@endsection