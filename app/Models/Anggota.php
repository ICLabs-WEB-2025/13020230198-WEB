<?php

namespace App\Models;
// jangan lupa import model
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'nim', 'fakultas', 'no_telp', 'email'];

public function index()
{
    $jumlahAnggota = Anggota::count(); // atau sesuai kebutuhan

    return view('home', compact('jumlahAnggota'));
    // atau bisa juga: return view('home', ['jumlahAnggota' => $jumlahAnggota]);
}

}

