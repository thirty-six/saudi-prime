<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\RamadanRegistration;

class RamadanInvoiceMail extends Mailable
{
    use Queueable, SerializesModels;

    public $registration;

    public function __construct(RamadanRegistration $registration)
    {
        $this->registration = $registration;
    }

    public function build()
    {
        return $this->subject('فاتورة تسجيل مخيم رمضان')
            ->view('emails.ramadan_invoice');
    }
}
