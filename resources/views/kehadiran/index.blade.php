@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

<style>
    body {
        background-image: url('https://t3.ftcdn.net/jpg/01/59/26/92/360_F_159269253_dT7REDoeN12q1h5gsDCpQkmri7iWPK1s.jpg');
    }
    .btn-primary {
        background: linear-gradient(45deg, #0d6efd, #0b5ed7);
        border: none;
    }

    .badge-hadir {
        background-color: #198754;
    }

    .badge-izin {
        background-color: #ffc107;
        color: #000;
    }

    .badge-alfa {
        background-color: #dc3545;
    }

    .table thead {
        background-color: #f8f9fa;
    }

    .table td, .table th {
        vertical-align: middle;
    }
</style>

<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-primary">
            <i class="fa-solid fa-user-check me-2"></i>Data Kehadiran
        </h2>
        <a href="{{ route('kehadiran.create') }}" class="btn btn-primary shadow-sm">
            <i class="fa-solid fa-plus me-2"></i>Tambah Kehadiran
        </a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            @if($kehadirans->isEmpty())
                <div class="text-center py-5 text-muted">
                    <i class="fa-solid fa-calendar-xmark fa-3x mb-3"></i>
                    <h5>Belum ada data kehadiran</h5>
                    <p>Silakan tambah data terlebih dahulu.</p>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Anggota</th>
                                <th>Jadwal</th>
                                <th>Status</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kehadirans as $kehadiran)
                            <tr>
                                <td class="fw-semibold">{{ $kehadiran->anggota->nama }}</td>
                                <td>
                                    <span class="text-secondary">{{ $kehadiran->jadwal->jenis }}</span><br>
                                    <small class="text-muted">{{ \Carbon\Carbon::parse($kehadiran->jadwal->tanggal)->format('d M Y') }}</small>
                                </td>
                                <td>
                                    @php
                                        $status = strtolower($kehadiran->status);
                                    @endphp
                                    @if($status === 'hadir')
                                        <span class="badge badge-hadir">Hadir</span>
                                    @elseif($status === 'izin')
                                        <span class="badge badge-izin">Izin</span>
                                    @else
                                        <span class="badge badge-alfa">Alfa</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <form action="{{ route('kehadiran.destroy', $kehadiran->id) }}" method="POST" onsubmit="return confirm('Hapus data ini?')" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            <i class="fa-solid fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
