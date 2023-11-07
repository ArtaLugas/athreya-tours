<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketWisata extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_paket', 'deskripsi', 'harga', 'lokasi_wisata', 'durasi', 'foto_wisata', 'tanggal_mulai', 'tanggal_berakhir', 'minimum_peserta'
    ];

    protected $casts = [
        'foto_wisata' => 'array',
    ];

    public static function getPaketWisata()
    {
        return self::first();
    }

    public function pesanan()
    {
        return $this->hasMany(Pesanan::class, 'paket_wisata_id');
    }
}
