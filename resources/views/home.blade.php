@extends('layouts.app')

@section('content')
<style>
    .hero-section {
        background: url('https://t3.ftcdn.net/jpg/01/59/26/92/360_F_159269253_dT7REDoeN12q1h5gsDCpQkmri7iWPK1s.jpg') no-repeat center center;
        background-size: cover;
        position: relative;
        height: 60vh;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        text-align: center;
        border-radius: 12px;
        overflow: hidden;
    }

    .hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 1;
    }

    .hero-content {
        position: relative;
        z-index: 2;
    }

    .feature-card:hover {
        transform: translateY(-5px);
        transition: 0.3s ease-in-out;
        box-shadow: 0 8px 16px rgba(0,0,0,0.1);
    }

    .footer-custom {
        background-color: #343a40;
        color: #ccc;
        padding: 20px 0;
        font-size: 0.9rem;
        text-align: center;
        margin-top: 40px;
        border-top: 3px solid #0d6efd;
    }
</style>

<div class="hero-section mb-5">
    <div class="hero-overlay"></div>
    <div class="container hero-content">
        <h2 class="fw-bold mb-3">Selamat Datang di <span class="text-warning">UKM Bulutangkis</span></h2>
        <p class="fs-5">Kelola anggota, jadwal latihan, kehadiran, dan pengumuman dengan mudah dan efisien.</p>
    </div>
</div>

<div class="row text-center">
    <div class="col-md-4 mb-4">
        <div class="card border-0 shadow-sm feature-card p-3 h-100">
            <div class="card-body">
                <i class="bi bi-people display-4 text-primary mb-3"></i>
                <h5 class="fw-semibold">Manajemen Anggota</h5>
                <p class="text-muted">Kelola data anggota UKM secara praktis.</p>
                <a href="{{ route('anggota.index') }}" class="btn btn-primary btn-sm">Lihat Anggota</a>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card border-0 shadow-sm feature-card p-3 h-100">
            <div class="card-body">
                <i class="bi bi-calendar-event display-4 text-success mb-3"></i>
                <h5 class="fw-semibold">Jadwal Latihan</h5>
                <p class="text-muted">Atur jadwal latihan dengan mudah dan efisien.</p>
                <a href="{{ route('jadwal.index') }}" class="btn btn-success btn-sm">Lihat Jadwal</a>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card border-0 shadow-sm feature-card p-3 h-100">
            <div class="card-body">
                <i class="bi bi-megaphone display-4 text-warning mb-3"></i>
                <h5 class="fw-semibold">Pengumuman</h5>
                <p class="text-muted">Dapatkan info penting UKM secara langsung.</p>
                <a href="{{ route('pengumuman.index') }}" class="btn btn-warning btn-sm text-white">Lihat Pengumuman</a>
            </div>
        </div>
    </div>
</div>

<footer class="footer-custom">
    <div class="container">
        &copy; {{ date('Y') }} UKM Bulutangkis - Universitas Muslim Indonesia. All rights reserved.
    </div>
</footer>
@endsection
