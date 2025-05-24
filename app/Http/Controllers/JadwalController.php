<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;
use App\Mail\JadwalUpdated;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class JadwalController extends Controller
{
    public function index()
{
    $jadwals = Jadwal::orderBy('created_at', 'asc')->get();
    return view('jadwal.index', compact('jadwals'));
}

    public function create()
    {
        return view('jadwal.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'jenis' => 'required',
        'tanggal' => 'required|date',
        'waktu' => 'required', // Pastikan validasi untuk waktu
        'tempat' => 'required',
    ]);

    Jadwal::create([
        'jenis' => $request->jenis,
        'tanggal' => $request->tanggal,
        'waktu' => $request->waktu,
        'tempat' => $request->tempat,
    ]);

    return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil ditambahkan.');
}



    public function edit($id)
{
    $jadwal = Jadwal::findOrFail($id);
    return view('jadwal.edit', compact('jadwal'));
}


  public function update(Request $request, $id)
{
    $request->validate([
        'jenis' => 'required|string',
        'tanggal' => 'required|date',
        'waktu' => 'required',
        'tempat' => 'required|string',
    ]);

    $jadwal = Jadwal::findOrFail($id);
    $jadwal->update($request->only(['jenis', 'tanggal', 'waktu', 'tempat']));

    // Ambil semua anggota (user) yang ingin dikirimi notifikasi
    $anggota = User::all();

    foreach ($anggota as $user) {
        Mail::to($user->email)->send(new JadwalUpdated($jadwal));
    }

    return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil diperbarui dan notifikasi terkirim!');
}

    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dihapus.');
    }
}

