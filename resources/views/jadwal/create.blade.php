@extends('layouts.app')

@section('content')
<!-- Tambahkan CDN Bootstrap untuk styling -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-success text-white">
            <h2 class="mb-0">Tambah Jadwal</h2>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('jadwal.store') }}" class="row g-3">
                @csrf
                <div class="col-md-6">
                    <label for="jenis" class="form-label">Jenis</label>
                    <select name="jenis" id="jenis" class="form-select @error('jenis') is-invalid @enderror" required>
                        <option value="" disabled selected>Pilih Jenis</option>
                        <option value="Latihan" {{ old('jenis') == 'Latihan' ? 'selected' : '' }}>Latihan</option>
                        <option value="Pertandingan" {{ old('jenis') == 'Pertandingan' ? 'selected' : '' }}>Pertandingan</option>
                    </select>
                    @error('jenis')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control @error('tanggal') is-invalid @enderror" required value="{{ old('tanggal') }}">
                    @error('tanggal')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="waktu" class="form-label">Waktu</label>
                    <input type="time" name="waktu" id="waktu" class="form-control @error('waktu') is-invalid @enderror" required value="{{ old('waktu') }}">
                    @error('waktu')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="tempat" class="form-label">Tempat</label>
                    <input type="text" name="tempat" id="tempat" class="form-control @error('tempat') is-invalid @enderror" placeholder="Tempat" required value="{{ old('tempat') }}">
                    @error('tempat')
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