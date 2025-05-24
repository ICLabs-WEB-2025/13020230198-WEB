<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kehadiran extends Model
{
    use HasFactory;

    protected $fillable = ['anggota_id', 'jadwal_id', 'status'];
    public function anggota()
{
    return $this->belongsTo(Anggota::class);
}

public function jadwal()
{
    return $this->belongsTo(Jadwal::class);
}

}

