<?php

namespace App\Http\Controllers;

use App\Models\Kehadiran;
use App\Models\Anggota;
use App\Models\Jadwal;
use Illuminate\Http\Request;

class KehadiranController extends Controller
{
    public function index()
    {
        $kehadirans = Kehadiran::with('anggota', 'jadwal')->get();
        return view('kehadiran.index', compact('kehadirans'));
    }

    public function create()
    {
        $anggotas = Anggota::all();
        $jadwals = Jadwal::all();
        return view('kehadiran.create', compact('anggotas', 'jadwals'));
    }

    // 🛠️ Perhatikan method ini
    public function store(Request $request)
    {
        $request->validate([
            'anggota_id' => 'required|exists:anggotas,id',
            'jadwal_id' => 'required|exists:jadwals,id',
            'status' => 'required|in:Hadir,Tidak Hadir,Izin',
        ]);

        // Baris yang menyebabkan error HARUS berada di sini
        Kehadiran::create([
            'anggota_id' => $request->anggota_id,
            'jadwal_id' => $request->jadwal_id,
            'status' => $request->status,
        ]);

        return redirect()->route('kehadiran.index')->with('success', 'Kehadiran berhasil dicatat.');
    }

    public function destroy(Kehadiran $kehadiran)
    {
        $kehadiran->delete();
        return redirect()->route('kehadiran.index')->with('success', 'Data kehadiran dihapus.');
    }
}
