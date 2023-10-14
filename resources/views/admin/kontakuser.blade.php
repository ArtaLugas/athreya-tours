@extends('admin.layouts.template')
@section('title')
    Pesan User | Athreya Tours
@endsection
@section('content')
    @push('css')
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    @endpush
    <style>
        a.btn-like {
            display: inline-block;
            padding: 6px 12px;
            font-size: 14px;
            font-weight: 400;
            line-height: 1.42857143;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            -ms-touch-action: manipulation;
            touch-action: manipulation;
            cursor: pointer;
            background-image: none;
            border: 1px solid transparent;
            border-radius: 4px;
            color: #fff;
            background-color: #5bc0de; /* Warna latar belakang biru (sesuaikan dengan warna btn-info) */
            text-decoration: none;
        }

        a.btn-like:hover {
            background-color: #31b0d5; /* Warna latar belakang biru saat dihover (sesuaikan dengan warna btn-info hover) */
        }

        a.btn-like:focus {
            background-color: #31b0d5; /* Warna latar belakang biru saat fokus (sesuaikan dengan warna btn-info focus) */
        }

        .btn-delete {
            display: inline-block;
            padding: 6px 12px;
            font-size: 14px;
            font-weight: 400;
            line-height: 1.42857143;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            -ms-touch-action: manipulation;
            touch-action: manipulation;
            cursor: pointer;
            background-image: none;
            border: 1px solid transparent;
            border-radius: 4px;
            background-color: #dc3545; /* Warna latar merah sesuai dengan warna bahaya */
            color: #fff; /* Warna teks putih */
            text-decoration: none; /* Menghilangkan dekorasi teks (underline) */
        }

        /* Hover effect saat kursor diarahkan ke tombol "Delete" (.btn-delete) */
        .btn-delete:hover {
            background-color: #c82333; /* Warna latar merah saat dihover */
            color: #fff; /* Warna teks putih saat dihover */
        }

        .btn-reply {
            display: inline-block;
            padding: 6px 12px;
            font-size: 14px;
            font-weight: 400;
            line-height: 1.42857143;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            -ms-touch-action: manipulation;
            touch-action: manipulation;
            cursor: pointer;
            background-image: none;
            border: 1px solid transparent;
            border-radius: 4px;
            background-color: #12dc00; /* Warna latar merah sesuai dengan warna bahaya */
            color: #fff; /* Warna teks putih */
            text-decoration: none; /* Menghilangkan dekorasi teks (underline) */
        }

        /* Hover effect saat kursor diarahkan ke tombol "reply" (.btn-reply) */
        .btn-reply:hover {
            background-color: #11c600; /* Warna latar merah saat dihover */
            color: #fff; /* Warna teks putih saat dihover */
        }


        /* CSS untuk Modal Detail Pesan */
        .modal-content {
            border: none; /* Hapus border pada modal */
            border-radius: 5px; /* Sudut bulat modal */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Bayangan modal */
        }

        .modal-header {
            background-color: #007bff; /* Warna latar belakang header modal */
            color: #fff; /* Warna teks header modal */
            border: none; /* Hapus border header modal */
        }

        .modal-title {
            font-weight: bold; /* Teks judul modal bold */
        }

        .modal-body {
            padding: 20px; /* Padding dalam modal body */
        }

        #modal-subject {
            color: #007bff; /* Warna teks subjek pesan */
            font-weight: bold; /* Teks subjek pesan bold */
        }

        #modal-message {
            color: #333; /* Warna teks isi pesan */
        }

        .modal-footer {
            border: none; /* Hapus border footer modal */
            padding: 10px; /* Padding dalam footer modal */
        }

        .modal-footer .btn-secondary {
            background-color: #6c757d; /* Warna latar belakang tombol "Tutup" */
            color: #fff; /* Warna teks tombol "Tutup" */
        }

        .modal-footer .btn-secondary:hover {
            background-color: #5a6268; /* Warna latar belakang tombol "Tutup" saat dihover */
        }

    </style>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Page/</span> List Pesan Pengguna</h4>
        <div class="row">
            <div class="card">
                <h5 class="card-header">Tabel Pesan Pengguna</h5>
                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-success">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="table-responsive text-nowrap">
                    <table class="table table-bordered table-hover">
                      <thead class="table-dark text-center">
                        <tr>
                            <th class="text-white">No.</th>
                            <th class="text-white">Nama</th>
                            <th class="text-white">Email</th>
                            <th class="text-white">Nomor Telepon</th>
                            <th class="text-white">Subjek</th>
                            <th class="text-white">Tanggal</th>
                            <th class="text-white">Aksi</th>
                        </tr>
                      </thead>
                      <tbody class="text-center">
                        @foreach ($pesanUser as $key => $pesan)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $pesan->name }}</td>
                                <td>{{ $pesan->email }}</td>
                                <td>{{ $pesan->phone }}</td>
                                <td>{{ $pesan->subject }}</td>
                                <td>{{ $pesan->created_at }}</td>
                                <td>
                                    <a href="#" class="btn-like" data-toggle="modal" data-target="#modalDetail-{{ $pesan->id }}">Lihat Detail</a>
                                    <a href="{{ route('tampilbalaspesan', $pesan->id) }}" class="btn-reply">Balas</a>
                                    <a href="{{ route('deletekontak', $pesan->id) }}" class="btn-delete" data-confirm="Apakah Anda yakin ingin menghapus pesan ini?">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @foreach ($pesanUser as $pesan)
    <!-- Modal Detail Pesan -->
        <div class="modal fade" id="modalDetail-{{ $pesan->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detail Pesan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h4 id="modal-subject">{{ $pesan->subject }}</h4>
                        <p id="modal-message">{{ $pesan->message }}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @push('script')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    @endpush
@endsection