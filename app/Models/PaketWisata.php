<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketWisata extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_paket', 'deskripsi', 'harga', 'lokasi_wisata', 'durasi', 'foto_wisata', 'tanggal_mulai', 'tanggal_berakhir'
    ];

    public static function getPaketWisata()
    {
        return self::first();
    }
}
