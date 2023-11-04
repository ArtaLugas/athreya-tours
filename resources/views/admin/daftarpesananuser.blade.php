@extends('admin.layouts.template')
@section('title')
Pesanan | Athreya Tours
@endsection
@section('content')
<style>
  .button-container {
    display: flex;
    justify-content: space-between;
  }

  .button-container a {
    margin: 10px;
  }

  .disabled {
    pointer-events: none;
    opacity: 0.6;
  }
</style>
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="py-3 mb-4"><span class="text-muted fw-light">Page/</span> Pesanan</h4>
  <div class="row">
    <div class="card">
      <h5 class="card-header">Tabel Pesanan User</h5>
      <div class="card-body">
        @if (session('message'))
        <div class="alert alert-success">
          {{ session('message') }}
        </div>
        @endif
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
        <div class="table-responsive text-nowrap">
          <table class="table table-bordered table-hover">
            <thead class="table-dark text-center">
              <tr>
                <th class="text-white">ID Pesanan</th>
                <th class="text-white">Nama Pemesan</th>
                <th class="text-white">Nama Paket</th>
                <th class="text-white">Jumlah Peserta</th>
                <th class="text-white">Total Harga</th>
                <th class="text-white">Status</th>
                <th class="text-white">Aksi</th>
              </tr>
            </thead>
            <tbody class="text-center">
              @foreach ($pesanan as $pesan)
              <tr>
                <td>{{ $pesan->id }}</td>
                <td>{{ $pesan->user->name }}</td>
                @if ($pesan->paketWisata)
                <td>{{ $pesan->paketWisata->nama_paket }}</td>
                @else
                <td>Data Paket Wisata Tidak Ditemukan</td>
                @endif
                <td>{{ $pesan->jumlah_orang }}</td>
                <td>Rp {{ number_format($pesan->total_harga, 0, ',' , '.')  }}</td>
                <td>{{ $pesan->status_pesanan }}</td>
                <td class="button-container">
                  @if (!$pesan->invoice_sent)
                  @foreach($pesanan as $pesan)
                  <a class="btn btn-primary btn-kirim-invoice" id="btn-kirim-invoice-{{ $pesan->id }}" href="{{ route('kiriminvoice', ['orderId' => $pesan->id]) }}" data-order-id="{{ $pesan->id }}">
                    Kirim Invoice
                  </a>
                  <a class="btn btn-success disabled" id="btn-terima-{{ $pesan->id }}" disabled>Terima</a>
                  <a class="btn btn-warning disabled" id="btn-tolak-{{ $pesan->id }}" disabled>Tolak</a>
                  @endforeach
                  @else
                  <a class="btn btn-primary disabled" id="btn-kirim-invoice-{{ $pesan->id }}" disabled>Kirim Invoice</a>
                  <a href="{{ route('terimapesanan', $pesan->id) }}" class="btn btn-success" onclick="event.preventDefault();document.getElementById('frmterima').submit();">Terima</a>
                  <form action="{{ route('terimapesanan', $pesan->id) }}" method="POST" id="frmterima">
                    @csrf
                  </form>
                  <a href="{{ route('tolakpesanan', $pesan->id) }}" class="btn btn-warning" onclick="event.preventDefault();document.getElementById('frmtolak').submit();">Tolak</a>
                  <form action="{{ route('tolakpesanan', $pesan->id) }}" method="POST" id="frmtolak">
                    @csrf
                  </form>
                  @endif
                  <a href="{{ route('deletepesanan', $pesan->id) }}" class="btn btn-danger" onclick="event.preventDefault(); if (confirm('Apakah Anda yakin ingin menghapus pesanan ini?')) { document.getElementById('frmhapus-{{ $pesan->id }}').submit(); }">Hapus</a>
                  <form action="{{ route('deletepesanan', $pesan->id) }}" method="GET" id="frmhapus-{{ $pesan->id }}" style="display: none;">
                    @csrf
                  </form>
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
<script>
  const kirimInvoiceButtons = document.querySelectorAll('.btn-kirim-invoice');

  kirimInvoiceButtons.forEach(button => {
    button.addEventListener('click', function() {
      const orderId = this.getAttribute('data-order-id');
      fetch("{{ route('kiriminvoice', 'orderId') }}", {
        method: 'GET',
        headers: {
          'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
          orderId: orderId
        })
      }).then(function(response) {
        if (response.ok) {
          this.classList.add('disabled');
          document.getElementById('btn-terima-' + orderId).classList.remove('disabled');
          document.getElementById('btn-tolak-' + orderId).classList.remove('disabled');
        }
      });
    });
  });
</script>
@endsection