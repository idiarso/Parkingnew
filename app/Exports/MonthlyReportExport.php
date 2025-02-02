<?php

namespace App\Exports;

use App\Models\Parking;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class MonthlyReportExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize
{
    protected $year;
    protected $month;

    public function __construct($year, $month)
    {
        $this->year = $year;
        $this->month = $month;
    }

    public function query()
    {
        return Parking::query()
            ->select(
                DB::raw('DATE(waktu_masuk) as date'),
                DB::raw('COUNT(*) as total'),
                DB::raw('SUM(CASE WHEN jenis_kendaraan = "motor" THEN 1 ELSE 0 END) as motor'),
                DB::raw('SUM(CASE WHEN jenis_kendaraan = "mobil" THEN 1 ELSE 0 END) as mobil'),
                DB::raw('SUM(biaya) as pendapatan')
            )
            ->whereYear('waktu_masuk', $this->year)
            ->whereMonth('waktu_masuk', $this->month)
            ->groupBy(DB::raw('DATE(waktu_masuk)'))
            ->orderBy('date');
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
            $row->date,
            $row->total,
            $row->motor,
            $row->mobil,
            $row->pendapatan
        ];
    }
}