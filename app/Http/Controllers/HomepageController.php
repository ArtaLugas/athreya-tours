<?php

namespace App\Http\Controllers;

use App\Models\PaketWisata;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $paketWisata = PaketWisata::all();

        return view('user.homepage', compact('paketWisata'));
    }
}
