<!-- resources/views/pengumuman/index.blade.php -->

@extends('layouts.app') {{-- opsional --}}

@section('content')
<h2>Daftar Pengumuman</h2>

<ul>
@foreach ($pengumumans as $p)
    <li>{{ $p->judul }} - {{ $p->isi }}</li>
@endforeach
</ul>
@endsection
