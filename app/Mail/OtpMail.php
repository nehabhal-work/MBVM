<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OtpMail extends Mailable
{
    use Queueable, SerializesModels;

    public string $otp;
    public string $purpose;

    public function __construct(string $otp, string $purpose = 'नोंदणी पडताळणी')
    {
        $this->otp = $otp;
        $this->purpose = $purpose;
    }

    public function build()
    {
        return $this->subject('तुमचा OTP कोड - MBVM')
            ->view('emails.otp');
    }
}
