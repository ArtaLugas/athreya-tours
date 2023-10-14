@extends('admin.layouts.template')
@section('title')
    Profil | Athreya Tours
@endsection
@section('content') 
    <style>
        /* CSS untuk Form Edit Profil */
        .form-group {
            margin-bottom: 20px;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-control-file {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            color: #fff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        /* CSS untuk Foto Profil */
        .profile-picture {
            text-align: center;
        }

        .profile-picture img {
            max-width: 100px;
            max-height: 100px;
            border-radius: 50%;
            margin: 10px auto;
            display: block;
        }

        /* Pesan Kesalahan Validasi */
        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            border-radius: 5px;
            padding: 10px;
            margin-top: 10px;
        }

        /* Pesan Sukses */
        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
            padding: 10px;
            margin-top: 10px;
        }

    </style>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Profil</div>
                    <div class="card-body text-center">
                        <div class="profile-picture">
                        @if ($user->photo_profile)
                            <img src="{{ asset('uploads/fotoProfil/' . $user->photo_profile) }}" alt="{{ $user->name }}" class="rounded-circle img-fluid">
                        @else
                            <span>Tidak foto profil</span>
                        @endif
                        <h5 class="card-title mt-3">{{ $user->name }}</h5>
                        <p class="card-text">{{ $user->role }}</p>
                    </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Profil</div>
                    <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif
                        <form action="{{ route('updateprofil', $user->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nama:</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                            </div>    
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                            </div>
                            <div class="form-group">
                                <label for="photo_profile">Foto Profil:</label>
                                <input type="file" class="form-control" id="photo_profile" name="photo_profile">
                            </div>
                            <div class="form-group">
                                @if ($user->photo_profile)
                                    <img src="{{ asset('uploads/fotoProfil/' . $user->photo_profile) }}" alt="{{ $user->name }}" style="max-width: 100px;">
                                @else
                                    <span>Tidak ada foto profil</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection