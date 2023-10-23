<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pesanan;
use App\Mail\InvoiceEmail;
use App\Models\PaketWisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AdminPesananController extends Controller
{
    public function DaftarPesananUser()
    {
        $user = Auth::user();
        $pesanan = Pesanan::with(['user', 'paketWisata'])->get();
        return view('admin.daftarpesananuser', compact('user', 'pesanan'));
    }

    public function TolakPesanan($id)
    {
        $order = Pesanan::find($id);

        if ($order && $order->status_pesanan === 'pending') {
            $order->update([
                'status_pesanan' => 'ditolak',
            ]);

            // Tambahkan log atau tindakan lain jika diperlukan

            return redirect()->back()->with('message', 'Pesanan telah ditolak.');
        }

        return redirect()->back()->with('errors', 'Gagal menolak pesanan.');
    }

    public function TerimaPesanan($id)
    {
        $order = Pesanan::find($id);

        if ($order && $order->status_pesanan === 'pending') {
            $order->update([
                'status_pesanan' => 'diterima',
            ]);

            // Tambahkan log atau tindakan lain jika diperlukan

            return redirect()->back()->with('message', 'Pesanan telah diterima.');
        }

        return redirect()->back()->with('errors', 'Gagal menerima pesanan.');
    }


    public function KirimInvoice($orderId)
    {
        $order = Pesanan::find($orderId);
        if ($order) {
            $order->invoice_sent = true;
            $order->save();
        }

        if ($order) {
            $user = $order->user;
            $paketWisata = PaketWisata::find($order->paket_wisata_id);

            Mail::to($user->email)->send(new InvoiceEmail($order, $user, $paketWisata));

            return redirect()->back()->with('message', 'Email Invoice Berhasil Dikirim!');
        }

        return redirect()->back()->with('errors', 'Gagal mengirim Email Invoice.');
    }

    public function DeletePesanan($id)
    {
        $order = Pesanan::find($id);

        if ($order) {
            $order->delete();

            Pesanan::where('id', '>', $id)->decrement('id');

            return redirect()->back()->with('message', 'Pesanan telah dihapus.');
        }

        return redirect()->back()->with('errors', 'Gagal menghapus pesanan.');
    }
}
