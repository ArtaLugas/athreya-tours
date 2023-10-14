<?php

namespace App\Http\Controllers;

use App\Models\PesanUser;
use Illuminate\Http\Request;
use App\Mail\BalasanPesanMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ContactAdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $pesanUser = PesanUser::all();
        return view('admin.kontakuser', compact('user', 'pesanUser'));
    }

    public function ShowKontak($id)
    {
        $pesan = PesanUser::find($id);

        if (!$pesan) {
            return redirect()->route('kontakuser')->with('error', 'Pesan tidak ditemukan.');
        }

        return view('admin.kontakuser', compact('pesan'));
    }

    public function TampilBalasPesan($id)
    {
        $user = Auth::user();
        $pesan = PesanUser::findOrFail($id);

        if (!$pesan) {
            return redirect()->route('kontakuser')->with('error', 'Pesan tidak ditemukan.');
        }

        return view('admin.balaskontak', compact('pesan', 'user'));
    }

    public function KirimBalasPesan(Request $request, $id)
    {
        $pesan = PesanUser::findOrFail($id);

        $this->validate($request, [
            'pesan_balasan' => 'required',
        ]);

        $pesanBalasan = $request->input('pesan_balasan');

        Mail::to($pesan->email)->send(new BalasanPesanMail($pesanBalasan));

        return redirect()->route('kontakuser')->with('message', 'Pesan Balasan Anda Telah Terkirim');
    }

    public function DeleteKontak($id)
    {
        $pesan = PesanUser::findOrFail($id);
        $pesan->delete();

        PesanUser::where('id', '>', $id)->decrement('id');

        return redirect()->route('kontakuser')->with('message', 'Pesan berhasil dihapus.');
    }
}
