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
        $paket = PaketWisata::findOrFail($id);

        $validatedData = $request->validate([
            'nama_paket' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'lokasi_wisata' => 'required',
            'durasi' => 'required|integer',
            'foto_wisata' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'tanggal_mulai' => 'required|date',
        ]);

        if ($request->hasFile('foto_wisata')) {

            $request->validate([
                'foto_wisata' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            if (file_exists(public_path('uploads/paketWisata/' . $paket->foto_wisata))) {
                unlink(public_path('uploads/paketWisata/' . $paket->foto_wisata));
            }

            $image = $request->file('foto_wisata');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/paketWisata'), $imageName);
            $validatedData['foto_wisata'] = $imageName;
        }

        $tanggalMulai = \Carbon\Carbon::parse($validatedData['tanggal_mulai']);
        $durasi = $validatedData['durasi'];
        $tanggalBerakhir = $tanggalMulai->addDays($durasi);
        $validatedData['tanggal_berakhir'] = $tanggalBerakhir;

        $paket->update($validatedData);

        return redirect()->route('listpaketwisata')->with('message', 'Paket Wisata Berhasil Diupdate!');
    }

    public function DeletePaketWisata($id)
    {
        $paket = PaketWisata::findOrFail($id);
        $paket->delete();

        PaketWisata::where('id', '>', $id)->decrement('id');

        return redirect()->route('listpaketwisata')->with('message', 'Paket Wisata Berhasil Dihapus!');
    }
}
