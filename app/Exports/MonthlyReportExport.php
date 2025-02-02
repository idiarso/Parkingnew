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

class MonthlyReportExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize, WithStyles
{
    protected $month;
    protected $year;

    public function __construct($month)
    {
        $date = \Carbon\Carbon::createFromFormat('Y-m', $month);
        $this->month = $date->month;
        $this->year = $date->year;
    }

    public function query()
    {
        return Parking::query()
            ->select(
                DB::raw('DATE(waktu_masuk) as tanggal'),
                DB::raw('COUNT(*) as total_kendaraan'),
                DB::raw('SUM(CASE WHEN jenis_kendaraan = "motor" THEN 1 ELSE 0 END) as total_motor'),
                DB::raw('SUM(CASE WHEN jenis_kendaraan = "mobil" THEN 1 ELSE 0 END) as total_mobil'),
                DB::raw('SUM(biaya) as total_pendapatan')
            )
            ->whereYear('waktu_masuk', $this->year)
            ->whereMonth('waktu_masuk', $this->month)
            ->groupBy('tanggal')
            ->orderBy('tanggal');
    }

    public function headings(): array
    {
        return [
            'Tanggal',
            'Total Kendaraan',
            'Motor',
            'Mobil',
            'Pendapatan'
        ];
    }

    public function map($row): array
    {
        return [
            $row->tanggal,
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