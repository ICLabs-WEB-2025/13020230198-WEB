@extends('layouts.app')

@section('content')
<!-- Tambahkan CDN Bootstrap untuk styling -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-success text-white">
            <h2 class="mb-0">Tambah Anggota</h2>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('anggota.store') }}" class="row g-3">
                @csrf
                <div class="col-md-6">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama" required value="{{ old('nama') }}">
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="nim" class="form-label">NIM</label>
                    <input type="text" name="nim" id="nim" class="form-control @error('nim') is-invalid @enderror" placeholder="NIM" required value="{{ old('nim') }}">
                    @error('nim')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="fakultas" class="form-label">Fakultas</label>
                    <input type="text" name="fakultas" id="fakultas" class="form-control @error('fakultas') is-invalid @enderror" placeholder="Fakultas" required value="{{ old('fakultas') }}">
                    @error('fakultas')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="no_telp" class="form-label">No Telp</label>
                    <input type="text" name="no_telp" id="no_telp" class="form-control @error('no_telp') is-invalid @enderror" placeholder="No Telp" required value="{{ old('no_telp') }}">
                    @error('no_telp')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" required value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12">
                    <label for="pengalaman" class="form-label">Pengalaman Bulutangkis</label>
                    <textarea name="pengalaman" id="pengalaman" class="form-control @error('pengalaman') is-invalid @enderror" placeholder="Pengalaman Bulutangkis">{{ old('pengalaman') }}</textarea>
                    @error('pengalaman')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-success w-100">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Tambahkan script Bootstrap untuk komponen interaktif (opsional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
@endsection