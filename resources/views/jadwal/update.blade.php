@component('mail::message')
# Jadwal Telah Diperbarui

Jadwal dengan rincian berikut telah diperbarui:

- **Jenis:** {{ $jadwal->jenis }}
- **Tanggal:** {{ $jadwal->tanggal }}
- **Waktu:** {{ $jadwal->waktu }}
- **Tempat:** {{ $jadwal->tempat }}

@component('mail::button', ['url' => url('/jadwal')])
Lihat Jadwal
@endcomponent

Terima kasih,<br>
{{ config('app.name') }}
@endcomponent
