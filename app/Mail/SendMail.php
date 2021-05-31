<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nama)
    {
        $this->nama = $nama;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('view.name');
        return $this->from('smtp.agussudarmanto@gmail.com', 'TU Biro Perencanaan dan Organisasi Mahkamah Agung RI')
            ->subject('Penerimaan email')
            ->view('email.email')
            ->with(
                [
                    'nama' => $this->nama
                ]
            );
    }
}
