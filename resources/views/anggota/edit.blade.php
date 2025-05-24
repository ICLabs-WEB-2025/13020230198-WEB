@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Anggota</h1>
   <form action="{{ route('anggota.update', $anggota->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama" class="form-control" value="{{ $anggota->nama }}" required>
        @error('nama')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="nim">NIM</label>
        <input type="text" name="nim" id="nim" class="form-control" value="{{ $anggota->nim }}" required>
        @error('nim')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
    <a href="{{ route('anggota.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</form>
</div>
@endsection