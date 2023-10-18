<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\PaketWisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaketWisataUserController extends Controller
{
    public function index(Request $request)
    {
        // Mengambil data paket wisata dari database
        $paketWisata = PaketWisata::orderBy('nama_paket', 'asc')->get(); // Ubah sesuai kebutuhan sort

        return view('user.paketwisata', compact('paketWisata'));
    }

    public function SortPaketWisata(Request $request)
    {
        $sortType = $request->sortType;

        if ($sortType === 'name-asc') {
            $paketWisata = PaketWisata::orderBy('nama_paket', 'asc')->get();
        } elseif ($sortType === 'name-desc') {
            $paketWisata = PaketWisata::orderBy('nama_paket', 'desc')->get();
        } elseif ($sortType === 'price-asc') {
            $paketWisata = PaketWisata::orderBy('harga', 'asc')->get();
        } elseif ($sortType === 'price-desc') {
            $paketWisata = PaketWisata::orderBy('harga', 'desc')->get();
        }

        return view('user.paketwisata', compact('paketWisata'));
    }

    public function ShowDetail($id)
    {
        $paketWisata = PaketWisata::findOrFail($id);

        if (!$paketWisata) {
            return redirect()->route('paketwisata')->with('error', 'Paket wisata tidak ditemukan');
        }

        $paketWisataLainnya = PaketWisata::where('id', '!=', $id)->limit(3)->get();


        return view('user.detailpaketwisata', compact('paketWisata', 'paketWisataLainnya'));
    }

    public function StorePemesanan(Request $request)
    {
        $validatedData = $request->validate([
            'paket_wisata_id' => 'required',
            'jumlah_orang' => 'required',
            'total_harga' => 'numeric',
        ]);

        $userId = Auth::id();

        Pesanan::create([
            'user_id' => $userId,
            'paket_wisata_id' => $validatedData['paket_wisata_id'],
            'jumlah_orang' => $validatedData['jumlah_orang'],
            'total_harga' => $validatedData['total_harga'],
            'status_pesanan' => 'pending',
        ]);

        return redirect()->route('detailpaketwisata', $request->paket_wisata_id)->with('message', 'Pemesanan Berhasil!');
    }
}
