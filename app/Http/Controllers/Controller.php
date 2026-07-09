<?php

namespace App\Http\Controllers;

use SimpleSoftwareIO\QrCode\Facades\QrCode;

abstract class Controller
{
    public function qr()
    {
        $qr = QrCode::format('png')
            ->size(1800)
            ->generate('https://mbvm.in/home');

        // dd($qr);
        return response($qr)->header('Content-Type', 'image/png');
    }
}
