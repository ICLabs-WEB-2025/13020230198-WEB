@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

<style>
    body {
        background-image: url('https://t3.ftcdn.net/jpg/01/59/26/92/360_F_159269253_dT7REDoeN12q1h5gsDCpQkmri7iWPK1s.jpg');
    }

</style>

<div class="container py-5">
    <div class="row mb-4">
        <div class="col-md-8">
            <h2 class="fw-bold text-primary"><i class="fa-solid fa-calendar-days me-2"></i>Jadwal Latihan & Pertandingan</h2>
        </div>
        <div class="col-md-4 text-md-end">
            <a href="{{ route('jadwal.create') }}" class="btn btn-primary shadow-sm">
                <i class="fa-solid fa-plus me-2"></i>Tambah Jadwal
            </a>
        </div>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-header">
            <div class="row text-center fw-semibold text-secondary">
                <div class="col-md-5 text-md-start">Detail Jadwal</div>
                <div class="col-md-3">Tanggal & Waktu</div>
                <div class="col-md-2">Lokasi</div>
                <div class="col-md-2">Aksi</div>
            </div>
        </div>

        <div class="card-body p-0">
            @if(count($jadwals) > 0)
                <ul class="list-group list-group-flush">
                    @foreach($jadwals as $jadwal)
                    <li class="list-group-item py-3">
                        <div class="row align-items-center text-center text-md-start">
                            <div class="col-md-5">
                                @if($jadwal->jenis == 'Latihan')
                                    <span class="badge bg-info text-white me-2"><i class="fa-solid fa-dumbbell me-1"></i>Latihan</span>
                                @else
                                    <span class="badge bg-danger text-white me-2"><i class="fa-solid fa-medal me-1"></i>Pertandingan</span>
                                @endif
                                <strong class="ms-1">{{ $jadwal->jenis }}</strong>
                            </div>
                            <div class="col-md-3">
                                <div class="d-flex flex-column align-items-md-center">
                                    <span>{{ \Carbon\Carbon::parse($jadwal->tanggal)->format('d M Y') }}</span>
                                    <small class="text-muted">{{ $jadwal->waktu }}</small>
                                </div>
                            </div>
                            <div class="col-md-2 text-muted">
                                {{ $jadwal->tempat }}
                            </div>
                            <div class="col-md-2 text-center">
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('jadwal.edit', $jadwal->id) }}" class="btn btn-outline-secondary" title="Edit">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <form action="{{ route('jadwal.destroy', $jadwal->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus jadwal ini?')" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger" title="Hapus">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            @else
                <div class="text-center py-5 no-jadwal">
                    <i class="fa-solid fa-calendar-xmark mb-3"></i>
                    <h5 class="text-muted">Belum ada jadwal</h5>
                    <p class="text-muted">Silakan tambahkan jadwal baru dengan menekan tombol "Tambah Jadwal"</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
