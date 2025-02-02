<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Tahunan - {{ $year }}</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .text-center { text-align: center; }
        .mb-4 { margin-bottom: 1rem; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 1rem; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f4f4f4; }
        .summary { margin-bottom: 2rem; }
        .summary-item { margin-bottom: 0.5rem; }
    </style>
</head>
<body>
    <h1 class="text-center">Laporan Tahunan Parkir</h1>
    <p class="text-center mb-4">Tahun: {{ $year }}</p>

    <div class="summary">
        <h3>Ringkasan:</h3>
        <div class="summary-item">Total Kendaraan: {{ $stats->total_kendaraan }}</div>
        <div class="summary-item">Total Motor: {{ $stats->total_motor }}</div>
        <div class="summary-item">Total Mobil: {{ $stats->total_mobil }}</div>
        <div class="summary-item">Total Pendapatan: Rp {{ number_format($stats->total_pendapatan, 0, ',', '.') }}</div>
    </div>

    <table>
        <thead>
            <tr>
                <th>Bulan</th>
                <th>Total Kendaraan</th>
                <th>Motor</th>
                <th>Mobil</th>
                <th>Pendapatan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($monthlyStats as $stat)
            <tr>
                <td>{{ date('F', mktime(0, 0, 0, $stat->bulan, 1)) }}</td>
                <td>{{ $stat->total_kendaraan }}</td>
                <td>{{ $stat->total_motor }}</td>
                <td>{{ $stat->total_mobil }}</td>
                <td>Rp {{ number_format($stat->total_pendapatan, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>