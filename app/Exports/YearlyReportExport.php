<?php

namespace App\Exports;

use App\Models\Parking;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class YearlyReportExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize, WithStyles
{
    protected $year;

    public function __construct($year)
    {
        $this->year = $year;
    }

    public function query()
    {
        return Parking::query()
            ->select(
                DB::raw('MONTH(waktu_masuk) as bulan'),
                DB::raw('COUNT(*) as total_kendaraan'),
                DB::raw('SUM(CASE WHEN jenis_kendaraan = "motor" THEN 1 ELSE 0 END) as total_motor'),
                DB::raw('SUM(CASE WHEN jenis_kendaraan = "mobil" THEN 1 ELSE 0 END) as total_mobil'),
                DB::raw('SUM(biaya) as total_pendapatan')
            )
            ->whereYear('waktu_masuk', $this->year)
            ->groupBy('bulan')
            ->orderBy('bulan');
    }

    public function headings(): array
    {
        return [
            'Bulan',
            'Total Kendaraan',
            'Motor',
            'Mobil',
            'Pendapatan'
        ];
    }

    public function map($row): array
    {
        return [
            date('F', mktime(0, 0, 0, $row->bulan, 1)),
            $row->total_kendaraan,
            $row->total_motor,
            $row->total_mobil,
            'Rp ' . number_format($row->total_pendapatan, 0, ',', '.')
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }
}