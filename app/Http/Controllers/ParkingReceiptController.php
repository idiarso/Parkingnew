<?php

namespace App\Http\Controllers;

use App\Models\Parking;
use Barryvdh\DomPDF\Facade\Pdf;

class ParkingReceiptController extends Controller
{
    public function show(Parking $parking)
    {
        return view('parking.receipt', compact('parking'));
    }

    public function download(Parking $parking)
    {
        $pdf = PDF::loadView('parking.receipt', compact('parking'));
        return $pdf->download("receipt-{$parking->ticket_number}.pdf");
    }
}