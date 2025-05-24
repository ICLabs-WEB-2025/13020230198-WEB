@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<style>
    body {
        background-image: url('https://t3.ftcdn.net/jpg/01/59/26/92/360_F_159269253_dT7REDoeN12q1h5gsDCpQkmri7iWPK1s.jpg'); /* Gambar bebas (badminton court) */
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
    }

    .bg-overlay {
        background-color: rgba(255, 255, 255, 0.9); /* lapisan putih semi transparan */
        min-height: 100vh;
        padding-top: 50px;
        padding-bottom: 50px;
    }

    .card-header {
        background: linear-gradient(135deg, #0d6efd, #0b5ed7);
    }

    .card-header h2 {
        font-weight: 600;
    }

    .table thead {
        background-color: #f8f9fa;
    }

    .btn-action {
        margin-right: 5px;
    }

    .btn-light:hover {
        background-color: #f1f1f1;
    }

    .no-data {
        text-align: center;
        padding: 50px 0;
        color: #6c757d;
    }
</style>

<div class="bg-overlay">
    <div class="container">
        <div class="card shadow-sm border-0">
            <div class="card-header text-white d-flex justify-content-between align-items-center rounded-top">
                <h2 class="mb-0"><i class="bi bi-people-fill me-2"></i>Daftar Anggota</h2>
                <a href="{{ route('anggota.create') }}" class="btn btn-light btn-sm">
                    <i class="bi bi-plus-circle me-1"></i>Tambah Anggota
                </a>
            </div>
            <div class="card-body">
                @if($anggotas->isEmpty())
                    <div class="no-data">
                        <i class="bi bi-exclamation-circle display-4"></i>
                        <p class="mt-3 fs-5">Belum ada anggota yang terdaftar.</p>
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>NIM</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($anggotas as $index => $anggota)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td class="fw-semibold">{{ $anggota->nama }}</td>
                                    <td>{{ $anggota->nim }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('anggota.edit', $anggota->id) }}" class="btn btn-sm btn-outline-warning btn-action" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <form action="{{ route('anggota.destroy', $anggota->id) }}" method="POST" class="d-inline">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger btn-action" title="Hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus anggota ini?')">
                                                <i class="bi bi-trash3"></i>
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
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection
