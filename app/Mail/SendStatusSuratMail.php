<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendStatusSuratMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        $this->data = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('view.name');
        return $this->from('biro-perencanaan@mahkamahagung.go.id', 'TU Biro Perencanaan dan Organisasi Mahkamah Agung RI')
            ->subject('Status penerimaan e-mail pada Biro Perencanaan dan Organisasi Mahkamah Agung RI')
            ->view('surat.email.status-surat')
            ->with(
                [
                    'data' => $this->data
                ]
            );
    }
}
