<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Compraemail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public $dataenvio;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data,$dataenvio)
    {
        $this->data = $data;
        $this->dataenvio = $dataenvio;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mail = $this->view('email.compra');
       $mail->from($this->dataenvio['email'], $this->dataenvio['de']);
       $mail->subject( $this->dataenvio['sujet']);
        return $mail;
    }
}
