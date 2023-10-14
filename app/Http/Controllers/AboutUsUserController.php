<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUsUserController extends Controller
{
    public function index()
    {
        $aboutUsData = AboutUs::where('status', 'aktif')->first();

        return view('user.tentangkami', compact('aboutUsData'));
    }
}
