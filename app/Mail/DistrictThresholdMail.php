<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DistrictThresholdMail extends Mailable
{
    use Queueable, SerializesModels;

    public string $jilha;
    public int $memberCount;

    public function __construct(string $jilha, int $memberCount)
    {
        $this->jilha = $jilha;
        $this->memberCount = $memberCount;
    }

    public function build()
    {
        return $this->subject("जिल्हा '{$this->jilha}' मध्ये {$this->memberCount} सदस्य नोंदणीकृत!")
            ->view('emails.district-threshold');
    }
}
