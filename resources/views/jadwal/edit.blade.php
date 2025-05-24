@extends('layouts.app')

@section('content')
<style>
    /* Styling tambahan untuk form */
    .form-edit-jadwal {
        max-width: 500px;
        margin: 30px auto;
        padding: 25px 30px;
        background: #f9fafb;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    .form-edit-jadwal h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
        font-weight: 700;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .form-edit-jadwal label {
        display: block;
        margin-bottom: 6px;
        font-weight: 600;
        color: #555;
    }
    .form-edit-jadwal input[type="text"],
    .form-edit-jadwal input[type="date"],
    .form-edit-jadwal input[type="time"] {
        width: 100%;
        padding: 8px 12px;
        margin-bottom: 18px;
        border: 1.5px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        transition: border-color 0.3s ease;
    }
    .form-edit-jadwal input[type="text"]:focus,
    .form-edit-jadwal input[type="date"]:focus,
    .form-edit-jadwal input[type="time"]:focus {
        border-color: #007bff;
        outline: none;
    }
    .form-edit-jadwal button {
        display: block;
        width: 100%;
        padding: 12px;
        background-color: #007bff;
        border: none;
        border-radius: 5px;
        color: white;
        font-weight: 700;
        font-size: 18px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    .form-edit-jadwal button:hover {
        background-color: #0056b3;
    }
</style>

<div class="form-edit-jadwal">
    <h2>Edit Jadwal</h2>

    <form action="{{ route('jadwal.update', $jadwal->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="jenis">Jenis:</label>
        <input type="text" id="jenis" name="jenis" value="{{ old('jenis', $jadwal->jenis) }}" required>

        <label for="tanggal">Tanggal:</label>
        <input type="date" id="tanggal" name="tanggal" value="{{ old('tanggal', $jadwal->tanggal) }}" required>

        <label for="waktu">Waktu:</label>
        <input type="time" id="waktu" name="waktu" value="{{ old('waktu', $jadwal->waktu) }}" required>

        <label for="tempat">Tempat:</label>
        <input type="text" id="tempat" name="tempat" value="{{ old('tempat', $jadwal->tempat) }}" required>

        <button type="submit">Update</button>
    </form>
</div>
@endsection
