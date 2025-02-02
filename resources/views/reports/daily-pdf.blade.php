<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Harian - {{ $date }}</title>
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
    <h1 class="text-center">Laporan Harian Parkir</h1>
    <p class="text-center mb-4">Tanggal: {{ \Carbon\Carbon::parse($date)->format('d F Y') }}</p>

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
                <th>No. Tiket</th>
                <th>Plat Nomor</th>
                <th>Jenis</th>
                <th>Masuk</th>
                <th>Keluar</th>
                <th>Durasi</th>
                <th>Biaya</th>
            </tr>
        </thead>
        <tbody>
            @foreach($parkings as $parking)
            <tr>
                <td>{{ $parking->nomor_tiket }}</td>
                <td>{{ $parking->nomor_plat }}</td>
                <td>{{ ucfirst($parking->jenis_kendaraan) }}</td>
                <td>{{ $parking->waktu_masuk->format('H:i:s') }}</td>
                <td>{{ $parking->waktu_keluar ? $parking->waktu_keluar->format('H:i:s') : '-' }}</td>
                <td>{{ $parking->durasi ?? '-' }}</td>
                <td>Rp {{ number_format($parking->biaya, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>