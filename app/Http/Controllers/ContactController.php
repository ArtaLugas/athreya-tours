<?php

namespace App\Http\Controllers;

use App\Models\PesanUser;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('user.kontakkami');
    }

    public function StoreKontakKami(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required',
            'subject' => 'required|string|max:255',
            'message' => 'required',
        ]);

        PesanUser::create($validatedData);

        return redirect()->route('kontakkami')->with('message', 'Pesan Anda Berhasil Terkirim!');
    }
}
