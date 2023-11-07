<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\PaketWisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaketWisataController extends Controller
{
    public function TambahPaketWisata()
    {
        $user = Auth::user();
        return view('admin.tambahpaketwisata', compact('user'));
    }

    public function ListPaketWisata()
    {
        $user = Auth::user();
        $paketwisata = PaketWisata::all();
        return view('admin.listpaketwisata', compact('user', 'paketwisata'));
    }

    public function StorePaketWisata(Request $request)
    {
        $validatedData = $request->validate([
            'nama_paket' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'lokasi_wisata' => 'required',
            'durasi' => 'required|integer',
            'tanggal_mulai' => 'required|date',
            'minimum_peserta' => 'required|integer|min:3',
        ]);

        $fotoWisataPaths = [];

        $tanggalMulai = Carbon::parse($validatedData['tanggal_mulai']);
        $durasi = $validatedData['durasi'];

        $tanggalBerakhir = $tanggalMulai->addDays($durasi);

        if ($request->hasFile('foto_wisata')) {
            foreach ($request->file('foto_wisata') as $image) {
                $imageName = time() . rand(1, 99) . '.' . $image->extension();
                $image->move(public_path('uploads/paketWisata'), $imageName);
                $fotoWisataPaths[] = $imageName;
            }
        }

        $validatedData['foto_wisata'] = json_encode($fotoWisataPaths); // Menggunakan JSON untuk menyimpan multiple paths.

        $validatedData['tanggal_berakhir'] = $tanggalBerakhir;

        PaketWisata::create($validatedData);

        return redirect()->route('listpaketwisata')->with('message', 'Paket Wisata Berhasil Ditambahkan');
    }


    public function EditPaketWisata($id)
    {
        $user = Auth::user();
        $paket = PaketWisata::findOrFail($id);
        return view('admin.editpaketwisata', compact('user', 'paket'));
    }

    public function UpdatePaketWisata(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_paket' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'lokasi_wisata' => 'required',
            'durasi' => 'required|integer',
            'tanggal_mulai' => 'required|date',
            'minimum_peserta' => 'required|integer|min:3',
        ]);

        $fotoWisataPaths = [];

        $tanggalMulai = Carbon::parse($validatedData['tanggal_mulai']);
        $durasi = $validatedData['durasi'];

        $tanggalBerakhir = $tanggalMulai->addDays($durasi);

        if ($request->hasFile('foto_wisata')) {
            foreach ($request->file('foto_wisata') as $image) {
                $imageName = time() . rand(1, 99) . '.' . $image->extension();
                $image->move(public_path('uploads/paketWisata'), $imageName);
                $fotoWisataPaths[] = $imageName;
            }
        }

        $paket = PaketWisata::findOrFail($id);

        $paket->update([
            'nama_paket' => $validatedData['nama_paket'],
            'deskripsi' => $validatedData['deskripsi'],
            'harga' => $validatedData['harga'],
            'lokasi_wisata' => $validatedData['lokasi_wisata'],
            'durasi' => $validatedData['durasi'],
            'tanggal_mulai' => $validatedData['tanggal_mulai'],
            'tanggal_berakhir' => $tanggalBerakhir,
            'foto_wisata' => json_encode($fotoWisataPaths),
            'minimum_peserta' => $validatedData['minimum_peserta'],
        ]);

        return redirect()->route('listpaketwisata')->with('message', 'Paket Wisata Berhasil Diupdate');
    }


    public function DeletePaketWisata($id)
    {
        $paket = PaketWisata::findOrFail($id);
        $paket->delete();

        PaketWisata::where('id', '>', $id)->decrement('id');

        return redirect()->route('listpaketwisata')->with('message', 'Paket Wisata Berhasil Dihapus!');
    }
}
