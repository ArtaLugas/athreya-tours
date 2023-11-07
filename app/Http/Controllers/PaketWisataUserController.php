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
        $sortPaketWisata = PaketWisata::query(); // Query builder untuk model PaketWisata

        switch ($sortType) {
            case 'name-asc':
                $sortPaketWisata->orderBy('nama_paket', 'asc');
                break;
            case 'name-desc':
                $sortPaketWisata->orderBy('nama_paket', 'desc');
                break;
            case 'price-asc':
                $sortPaketWisata->orderBy('harga', 'asc');
                break;
            case 'price-desc':
                $sortPaketWisata->orderBy('harga', 'desc');
                break;
            case 'popularity-asc':
                $sortPaketWisata->orderBy('popularitas', 'asc'); // Gantilah 'popularitas' dengan kolom yang sesuai dalam tabel Anda
                break;
            case 'popularity-desc':
                $sortPaketWisata->orderBy('popularitas', 'desc'); // Gantilah 'popularitas' dengan kolom yang sesuai dalam tabel Anda
                break;
        }

        $paketWisata = $sortPaketWisata->get();

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

        $paketWisata = PaketWisata::find($request->paket_wisata_id);
        $paketWisata->increment('popularitas');

        return redirect()->route('detailpaketwisata', $request->paket_wisata_id)->with('message', 'Pemesanan Berhasil!');
    }
}
