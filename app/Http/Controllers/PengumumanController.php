<?php

namespace App\Http\Controllers;
use App\Models\Pengumuman;

class PengumumanController extends Controller
{
    public function index()
    {
    $pengumumans = Pengumuman::all();
    return view('pengumuman.index', compact('pengumumans'));
    }

}
