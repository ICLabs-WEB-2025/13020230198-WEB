@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Catat Kehadiran Anggota</h2>
    <form method="POST" action="{{ route('kehadiran.store') }}">
        @csrf
        <select name="anggota_id" required>
            <option value="">Pilih Anggota</option>
            @foreach($anggotas as $anggota)
                <option value="{{ $anggota->id }}">{{ $anggota->nama }}</option>
            @endforeach
        </select>

        <select name="jadwal_id" required>
            <option value="">Pilih Jadwal</option>
            @foreach($jadwals as $jadwal)
                <option value="{{ $jadwal->id }}">{{ $jadwal->jenis }} - {{ $jadwal->tanggal }}</option>
            @endforeach
        </select>

        <select name="status" required>
            <option value="Hadir">Hadir</option>
            <option value="Tidak Hadir">Tidak Hadir</option>
            <option value="Izin">Izin</option>
        </select>

        <button type="submit">Simpan</button>
    </form>
</div>
@endsection
