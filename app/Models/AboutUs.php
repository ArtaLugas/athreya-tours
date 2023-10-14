<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'status'
    ];

    public static function getAboutUsData()
    {
        return self::where('status', 'aktif')->first();
    }
}
