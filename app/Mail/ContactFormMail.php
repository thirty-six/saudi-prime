<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $data;

    public function __construct( array $data )
    {
        $this->data = $data;
    }

  public function build(): ContactFormMail{
    return $this
            ->subject(subject: 'رسالة تواصل معنا')
            ->view('emails.contact'); // HTML view
  }
}