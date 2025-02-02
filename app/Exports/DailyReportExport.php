<?php

namespace App\Exports;

use App\Models\Parking;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class DailyReportExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize, WithStyles
{
    protected $date;

    public function __construct($date)
    {
        $this->date = $date;
    }

    public function query()
    {
        return Parking::query()
            ->whereDate('waktu_masuk', $this->date)
            ->orderBy('waktu_masuk');
    }

    public function headings(): array
    {
        return [
            'No. Tiket',
            'Plat Nomor',
            'Jenis Kendaraan',
            'Waktu Masuk',
            'Waktu Keluar',
            'Durasi',
            'Biaya'
        ];
    }

    public function map($parking): array
    {
        return [
            $parking->nomor_tiket,
            $parking->nomor_plat,
            $parking->jenis_kendaraan,
            $parking->waktu_masuk->format('H:i:s'),
            $parking->waktu_keluar ? $parking->waktu_keluar->format('H:i:s') : '-',
            $parking->durasi ?? '-',
            $parking->biaya ? 'Rp ' . number_format($parking->biaya, 0, ',', '.') : '-'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }
}