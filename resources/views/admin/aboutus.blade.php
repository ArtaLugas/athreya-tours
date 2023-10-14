@extends('admin.layouts.template')
@section('title')
    Tentang Kami | Athreya Tours
@endsection
@section('content')
    @push('css')
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    @endpush
    <style>
        /* CSS untuk tautan status */

        .active {
            background-color: #4CAF50; /* Warna latar belakang untuk status aktif */
        }

        .inactive {
            background-color: #F44336; /* Warna latar belakang untuk status nonaktif */
        }

    </style>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Page/</span>Data Tentang Kami</h4>
        <div class="row">
            <div class="card">
                <h5 class="card-header">Tabel Tentang Kami</h5>
                <div class="card-body">
                    <button class="btn btn-primary my-2" style="width: auto" data-toggle="modal" data-target="#addAboutUsModal">Tambah Tentang Kami</button>
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
                                <th class="text-white">Konten Tentang Kami</th>
                                <th class="text-white">Status</th>
                                <th class="text-white">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($aboutus as $key => $about)
                                <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $about->content }}</td>
                               <td>
                                    @if($about->status == 'aktif')
                                        <a href="{{ route('togglestatus', $about->id) }}" class="btn btn-success active" onclick="return confirm('Anda yakin ingin menonaktifkan ini?')">Aktif</a>
                                    @else
                                        <a href="{{ route('togglestatus', $about->id) }}" class="btn btn-warning inactive" onclick="return confirm('Anda yakin ingin mengaktifkan ini?')">Nonaktif</a>
                                    @endif
                                </td>

                                <td>
                                    <a href="{{ route('deleteaboutus', $about->id) }}" class="btn btn-danger" onclick="return confirmDelete()">Hapus</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>    
        </div>
    </div>
    <div class="modal fade" id="addAboutUsModal" tabindex="-1" role="dialog" aria-labelledby="addAboutUsModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addAboutUsModalLabel">Tambah Tentang Kami</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('storetentangkami') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="content">Konten About Us:</label>
                            <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="status">Status:</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="aktif">Aktif</option>
                                <option value="nonaktif">Nonaktif</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function confirmDelete() {
            return confirm('Anda yakin ingin menghapus ini?');
        }

    </script>
@push('script')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
@endpush
@endsection