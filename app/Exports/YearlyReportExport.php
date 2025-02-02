<?php

namespace App\Exports;

use App\Models\Parking;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class YearlyReportExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize
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
                DB::raw('MONTH(waktu_masuk) as month'),
                DB::raw('COUNT(*) as total'),
                DB::raw('SUM(CASE WHEN jenis_kendaraan = "motor" THEN 1 ELSE 0 END) as motor'),
                DB::raw('SUM(CASE WHEN jenis_kendaraan = "mobil" THEN 1 ELSE 0 END) as mobil'),
                DB::raw('SUM(biaya) as pendapatan')
            )
            ->whereYear('waktu_masuk', $this->year)
            ->groupBy(DB::raw('MONTH(waktu_masuk)'))
            ->orderBy('month');
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
            date('F', mktime(0, 0, 0, $row->month, 1)),
            $row->total,
            $row->motor,
            $row->mobil,
            $row->pendapatan
        ];
    }
}