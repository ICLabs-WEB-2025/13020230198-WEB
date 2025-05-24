<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengumuman; // Pastikan model Pengumuman sudah ada

class HomeController extends Controller
{
    public function index()
    {
        $jadwalTerdekat = \App\Models\Jadwal::orderBy('tanggal', 'asc')->take(5)->get(); // Pastikan sudah ada
        $pengumumanTerbaru = Pengumuman::orderBy('created_at', 'desc')->take(5)->get(); // Ambil 5 pengumuman terbaru
        return view('home', compact('jadwalTerdekat', 'pengumumanTerbaru'));
    }
}