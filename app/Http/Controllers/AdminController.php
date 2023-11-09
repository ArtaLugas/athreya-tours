<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\AboutUs;
use App\Models\Pesanan;
use App\Models\PesanUser;
use App\Models\PaketWisata;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function dashboard(Request $request)
    {
        $user = Auth::user();
        $totalPesanan = Pesanan::count();
        $totalPaketWisata = PaketWisata::count();
        $totalUsers = User::count();
        $totalPesan = PesanUser::count();

        $filter = $request->input('sortFilter');

        $dataPesanan = Pesanan::select('paket_wisata_id')
            ->selectRaw('COUNT(*) as jumlah_pesanan')
            ->selectRaw('SUM(jumlah_orang) as jumlah_orang')
            ->selectRaw('SUM(total_harga) as total_harga_pesanan')
            ->groupBy('paket_wisata_id');

        // Tambahkan logika filter waktu
        if ($filter) {
            $today = now()->toDateString();

            switch ($filter) {
                case 'today':
                    $dataPesanan->whereDate('created_at', $today);
                    break;
                case 'this_week':
                    $dataPesanan->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
                    break;
                case 'this_month':
                    $dataPesanan->whereMonth('created_at', now()->month);
                    break;
                case 'this_year':
                    $dataPesanan->whereYear('created_at', now()->year);
                    break;
                    // Tambahkan filter lainnya sesuai kebutuhan
            }
        }

        $dataPesanan = $dataPesanan->get();
        $totalPemasukan = $dataPesanan->sum('total_harga_pesanan');

        return view('admin.dashboard', compact('user', 'totalPesanan', 'totalPesan', 'totalPaketWisata', 'totalUsers', 'dataPesanan', 'totalPemasukan'));
    }

    public function downloadPDF(Request $request)
    {
        // Logika untuk mendapatkan data yang ingin dicetak ke dalam PDF
        $dataPesanan = Pesanan::select('paket_wisata_id')
            ->selectRaw('COUNT(*) as jumlah_pesanan')
            ->selectRaw('SUM(jumlah_orang) as jumlah_orang')
            ->selectRaw('SUM(total_harga) as total_harga_pesanan')
            ->groupBy('paket_wisata_id')
            ->get();

        $totalPemasukan = $dataPesanan->sum('total_harga_pesanan');

        // View blade yang berisi HTML untuk PDF
        $pdfView = view('admin.pdf', compact('dataPesanan', 'totalPemasukan'))->render();

        // Nama file PDF yang akan diunduh
        $pdfFileName = 'laporan_pemasukan.pdf';

        // Simpan PDF di dalam folder public
        $filePath = public_path('pdf/' . $pdfFileName);
        PDF::loadHTML($pdfView)->save($filePath);

        // Setelah PDF di-generate, kirimkan response ke user
        return response()->download($filePath, $pdfFileName)->deleteFileAfterSend(true);
    }
}
