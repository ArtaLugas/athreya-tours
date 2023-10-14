<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AboutUsController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $aboutus = AboutUs::all();
        return view('admin.aboutus', compact('user', 'aboutus'));
    }

    public function StoreTentangKami(Request $request)
    {
        $validatedData = $request->validate([
            'content' => 'required',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        // Simpan data About Us ke dalam database
        AboutUs::create($validatedData);

        return redirect()->route('aboutus')->with('message', 'Data Tentang Kami berhasil ditambahkan.');
    }

    public function toggleStatus($id)
    {
        $aboutUs = AboutUs::findOrFail($id);

        $aboutUs->status = ($aboutUs->status == 'aktif') ? 'nonaktif' : 'aktif';
        $aboutUs->save();

        return redirect()->route('aboutus')->with('message', 'Status About Us berhasil diperbarui.');
    }


    public function DeleteAboutUs($id)
    {
        $aboutus = AboutUs::findOrFail($id);
        $aboutus->delete();

        AboutUs::where('id', '>', $id)->decrement('id');
        return redirect()->route('aboutus')->with('message', 'Data Tentang Kami berhasil dihapus.');
    }
}
