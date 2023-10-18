<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\PaketWisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomepageController extends Controller
{
    public function index()
    {
        $paketWisata = PaketWisata::limit(6)->get();
        return view('user.homepage', compact('paketWisata'));
    }

    public function RiwayatPesanan()
    {
        $user = auth()->user();
        $riwayatPesanan = Pesanan::where('user_id', $user->id)->get();

        return view('user.riyawatpesanan', compact('riwayatPesanan'));
    }
}
