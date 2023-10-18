<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanans';

    protected $fillable = [
        'user_id',
        'paket_wisata_id',
        'jumlah_orang',
        'total_harga',
        'status_pesanan',
    ];

    // Hubungan dengan model User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Hubungan dengan model PaketWisata
    public function paketWisata()
    {
        return $this->belongsTo(PaketWisata::class, 'paket_wisata_id');
    }
}
