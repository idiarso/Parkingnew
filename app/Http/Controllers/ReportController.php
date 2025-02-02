<?php

namespace App\Http\Controllers;

use App\Exports\DailyReportExport;
use App\Exports\MonthlyReportExport;
use App\Exports\YearlyReportExport;
use App\Models\ParkingTransaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function daily(Request $request)
    {
        $date = $request->get('date', date('Y-m-d'));
        
        $stats = ParkingTransaction::whereDate('waktu_masuk', $date)
            ->select([
                DB::raw('COUNT(*) as total_kendaraan'),
                DB::raw('SUM(CASE WHEN jenis_kendaraan = "motor" THEN 1 ELSE 0 END) as total_motor'),
                DB::raw('SUM(CASE WHEN jenis_kendaraan = "mobil" THEN 1 ELSE 0 END) as total_mobil'),
                DB::raw('SUM(biaya) as total_pendapatan')
            ])
            ->first();

        $parkings = ParkingTransaction::whereDate('waktu_masuk', $date)
            ->orderBy('waktu_masuk')
            ->get();

        return view('reports.daily', compact('stats', 'parkings'));
    }

    public function monthly(Request $request)
    {
        $month = $request->get('month', date('Y-m'));
        list($year, $month) = explode('-', $month);
        
        $stats = ParkingTransaction::whereYear('waktu_masuk', $year)
            ->whereMonth('waktu_masuk', $month)
            ->select([
                DB::raw('COUNT(*) as total_kendaraan'),
                DB::raw('SUM(CASE WHEN jenis_kendaraan = "motor" THEN 1 ELSE 0 END) as total_motor'),
                DB::raw('SUM(CASE WHEN jenis_kendaraan = "mobil" THEN 1 ELSE 0 END) as total_mobil'),
                DB::raw('SUM(biaya) as total_pendapatan')
            ])
            ->first();

        $dailyStats = ParkingTransaction::whereYear('waktu_masuk', $year)
            ->whereMonth('waktu_masuk', $month)
            ->select([
                DB::raw('DATE(waktu_masuk) as tanggal'),
                DB::raw('COUNT(*) as total_kendaraan'),
                DB::raw('SUM(CASE WHEN jenis_kendaraan = "motor" THEN 1 ELSE 0 END) as total_motor'),
                DB::raw('SUM(CASE WHEN jenis_kendaraan = "mobil" THEN 1 ELSE 0 END) as total_mobil'),
                DB::raw('SUM(biaya) as total_pendapatan')
            ])
            ->groupBy('tanggal')
            ->orderBy('tanggal')
            ->get();

        return view('reports.monthly', compact('stats', 'dailyStats'));
    }

    public function yearly(Request $request)
    {
        $year = $request->get('year', date('Y'));
        
        $stats = ParkingTransaction::whereYear('waktu_masuk', $year)
            ->select([
                DB::raw('COUNT(*) as total_kendaraan'),
                DB::raw('SUM(CASE WHEN jenis_kendaraan = "motor" THEN 1 ELSE 0 END) as total_motor'),
                DB::raw('SUM(CASE WHEN jenis_kendaraan = "mobil" THEN 1 ELSE 0 END) as total_mobil'),
                DB::raw('SUM(biaya) as total_pendapatan')
            ])
            ->first();

        $monthlyStats = ParkingTransaction::whereYear('waktu_masuk', $year)
            ->select([
                DB::raw('MONTH(waktu_masuk) as bulan'),
                DB::raw('COUNT(*) as total_kendaraan'),
                DB::raw('SUM(CASE WHEN jenis_kendaraan = "motor" THEN 1 ELSE 0 END) as total_motor'),
                DB::raw('SUM(CASE WHEN jenis_kendaraan = "mobil" THEN 1 ELSE 0 END) as total_mobil'),
                DB::raw('SUM(biaya) as total_pendapatan')
            ])
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();

        return view('reports.yearly', compact('stats', 'monthlyStats'));
    }

    public function exportDaily(Request $request)
    {
        $date = $request->get('date', date('Y-m-d'));
        $type = $request->get('type', 'pdf');

        if ($type === 'pdf') {
            $stats = ParkingTransaction::whereDate('waktu_masuk', $date)
                ->select([
                    DB::raw('COUNT(*) as total_kendaraan'),
                    DB::raw('SUM(CASE WHEN jenis_kendaraan = "motor" THEN 1 ELSE 0 END) as total_motor'),
                    DB::raw('SUM(CASE WHEN jenis_kendaraan = "mobil" THEN 1 ELSE 0 END) as total_mobil'),
                    DB::raw('SUM(biaya) as total_pendapatan')
                ])
                ->first();

            $parkings = ParkingTransaction::whereDate('waktu_masuk', $date)
                ->orderBy('waktu_masuk')
                ->get();

            $pdf = PDF::loadView('reports.daily-pdf', compact('stats', 'parkings', 'date'));
            return $pdf->download('laporan-harian-' . $date . '.pdf');
        }

        return Excel::download(new DailyReportExport($date), 'laporan-harian-' . $date . '.xlsx');
    }

    public function exportMonthly(Request $request)
    {
        $month = $request->get('month', date('Y-m'));
        $type = $request->get('type', 'pdf');

        if ($type === 'pdf') {
            list($year, $monthNum) = explode('-', $month);
            
            $stats = ParkingTransaction::whereYear('waktu_masuk', $year)
                ->whereMonth('waktu_masuk', $monthNum)
                ->select([
                    DB::raw('COUNT(*) as total_kendaraan'),
                    DB::raw('SUM(CASE WHEN jenis_kendaraan = "motor" THEN 1 ELSE 0 END) as total_motor'),
                    DB::raw('SUM(CASE WHEN jenis_kendaraan = "mobil" THEN 1 ELSE 0 END) as total_mobil'),
                    DB::raw('SUM(biaya) as total_pendapatan')
                ])
                ->first();

            $dailyStats = ParkingTransaction::whereYear('waktu_masuk', $year)
                ->whereMonth('waktu_masuk', $monthNum)
                ->select([
                    DB::raw('DATE(waktu_masuk) as tanggal'),
                    DB::raw('COUNT(*) as total_kendaraan'),
                    DB::raw('SUM(CASE WHEN jenis_kendaraan = "motor" THEN 1 ELSE 0 END) as total_motor'),
                    DB::raw('SUM(CASE WHEN jenis_kendaraan = "mobil" THEN 1 ELSE 0 END) as total_mobil'),
                    DB::raw('SUM(biaya) as total_pendapatan')
                ])
                ->groupBy('tanggal')
                ->orderBy('tanggal')
                ->get();

            $pdf = PDF::loadView('reports.monthly-pdf', compact('stats', 'dailyStats', 'month'));
            return $pdf->download('laporan-bulanan-' . $month . '.pdf');
        }

        return Excel::download(new MonthlyReportExport($month), 'laporan-bulanan-' . $month . '.xlsx');
    }

    public function exportYearly(Request $request)
    {
        $year = $request->get('year', date('Y'));
        $type = $request->get('type', 'pdf');

        if ($type === 'pdf') {
            $stats = ParkingTransaction::whereYear('waktu_masuk', $year)
                ->select([
                    DB::raw('COUNT(*) as total_kendaraan'),
                    DB::raw('SUM(CASE WHEN jenis_kendaraan = "motor" THEN 1 ELSE 0 END) as total_motor'),
                    DB::raw('SUM(CASE WHEN jenis_kendaraan = "mobil" THEN 1 ELSE 0 END) as total_mobil'),
                    DB::raw('SUM(biaya) as total_pendapatan')
                ])
                ->first();

            $monthlyStats = ParkingTransaction::whereYear('waktu_masuk', $year)
                ->select([
                    DB::raw('MONTH(waktu_masuk) as bulan'),
                    DB::raw('COUNT(*) as total_kendaraan'),
                    DB::raw('SUM(CASE WHEN jenis_kendaraan = "motor" THEN 1 ELSE 0 END) as total_motor'),
                    DB::raw('SUM(CASE WHEN jenis_kendaraan = "mobil" THEN 1 ELSE 0 END) as total_mobil'),
                    DB::raw('SUM(biaya) as total_pendapatan')
                ])
                ->groupBy('bulan')
                ->orderBy('bulan')
                ->get();

            $pdf = PDF::loadView('reports.yearly-pdf', compact('stats', 'monthlyStats', 'year'));
            return $pdf->download('laporan-tahunan-' . $year . '.pdf');
        }

        return Excel::download(new YearlyReportExport($year), 'laporan-tahunan-' . $year . '.xlsx');
    }
}