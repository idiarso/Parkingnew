@extends('layouts.dashboard')
@section('title', 'Laporan Tahunan')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="card-title">Laporan Tahunan</h4>
                        <form class="d-flex gap-2">
                            <select class="form-select" name="year">
                                @for($i = date('Y'); $i >= date('Y')-5; $i--)
                                    <option value="{{ $i }}" {{ request('year', date('Y')) == $i ? 'selected' : '' }}>
                                        {{ $i }}
                                    </option>
                                @endfor
                            </select>
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </form>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-4">
                            <div class="card bg-primary text-white">
                                <div class="card-body">
                                    <h5>Total Kendaraan</h5>
                                    <h3>{{ $yearlyStats->total_vehicles ?? 0 }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-success text-white">
                                <div class="card-body">
                                    <h5>Total Pendapatan</h5>
                                    <h3>Rp {{ number_format($yearlyStats->total_income ?? 0, 0, ',', '.') }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-info text-white">
                                <div class="card-body">
                                    <h5>Rata-rata per Bulan</h5>
                                    <h3>Rp {{ number_format($yearlyStats->average_monthly_income ?? 0, 0, ',', '.') }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-centered mb-0">
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
                                @forelse($monthlyStats ?? [] as $stat)
                                <tr>
                                    <td>{{ date('F', mktime(0, 0, 0, $stat->month, 1)) }}</td>
                                    <td>{{ $stat->total_vehicles }}</td>
                                    <td>{{ $stat->motorcycles }}</td>
                                    <td>{{ $stat->cars }}</td>
                                    <td>Rp {{ number_format($stat->income, 0, ',', '.') }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center">Tidak ada data</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection