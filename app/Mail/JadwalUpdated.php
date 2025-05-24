<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class JadwalUpdated extends Mailable
{
    use Queueable, SerializesModels;

    public $jadwal;

    /**
     * Create a new message instance.
     */
    public function __construct($jadwal)
    {
        $this->jadwal = $jadwal;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Jadwal Telah Diperbarui')
                    ->markdown('emails.jadwal.updated')
                    ->with([
                        'jadwal' => $this->jadwal,
                    ]);
    }
}
