<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $fillable = ['jenis', 'tanggal', 'waktu', 'tempat', 'updated_at', 'created_at'];
}
