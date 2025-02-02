@extends('layouts.dashboard')
@section('title', 'Laporan Harian')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="card-title">Laporan Harian</h4>
                        <div class="d-flex gap-2">
                            <form class="d-flex gap-2">
                                <input type="date" class="form-control" name="date" 
                                       value="{{ request('date', date('Y-m-d')) }}">
                                <button type="submit" class="btn btn-primary">Filter</button>
                            </form>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                    Export
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('reports.daily.export', ['type' => 'pdf'] + request()->all()) }}">
                                            <i class="fas fa-file-pdf me-2"></i> Export PDF
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('reports.daily.export', ['type' => 'excel'] + request()->all()) }}">
                                            <i class="fas fa-file-excel me-2"></i> Export Excel
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Statistics Cards -->
                    <div class="row mb-4">
                        <div class="col-md-3">
                            <div class="card bg-primary text-white">
                                <div class="card-body">
                                    <h5 class="card-title">Total Kendaraan</h5>
                                    <h2 class="mb-0">{{ $stats->total_kendaraan }}</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-success text-white">
                                <div class="card-body">
                                    <h5 class="card-title">Total Motor</h5>
                                    <h2 class="mb-0">{{ $stats->total_motor }}</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-warning text-white">
                                <div class="card-body">
                                    <h5 class="card-title">Total Mobil</h5>
                                    <h2 class="mb-0">{{ $stats->total_mobil }}</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-info text-white">
                                <div class="card-body">
                                    <h5 class="card-title">Total Pendapatan</h5>
                                    <h2 class="mb-0">Rp {{ number_format($stats->total_pendapatan, 0, ',', '.') }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Parkings Table -->
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection