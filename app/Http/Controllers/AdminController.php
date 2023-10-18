<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\AboutUs;
use App\Models\Pesanan;
use App\Models\PaketWisata;
use App\Models\PesanUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $totalPesanan = Pesanan::count();
        $totalPaketWisata = PaketWisata::count();
        $totalUsers = User::count();
        $totalPesan = PesanUser::count();

        return view('admin.dashboard', compact('user', 'totalPesanan', 'totalPaketWisata',  'totalUsers', 'totalPesan'));
    }
}
