@extends('layouts.dashboard')
@section('title', 'Dashboard')
@section('content')
<div class="container-fluid">
    <!-- Widgets -->
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h4 class="mb-2">{{ $totalActive }}</h4>
                            <p class="text-muted mb-0">Kendaraan Aktif</p>
                        </div>
                        <div class="avatar-sm rounded-circle bg-primary align-self-center">
                            <span class="avatar-title rounded-circle bg-primary">
                                <i class="fas fa-car font-size-24"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h4 class="mb-2">{{ $todayTotal }}</h4>
                            <p class="text-muted mb-0">Total Hari Ini</p>
                        </div>
                        <div class="avatar-sm rounded-circle bg-success align-self-center">
                            <span class="avatar-title rounded-circle bg-success">
                                <i class="fas fa-calendar-day font-size-24"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h4 class="mb-2">Rp {{ number_format($todayIncome, 0, ',', '.') }}</h4>
                            <p class="text-muted mb-0">Pendapatan Hari Ini</p>
                        </div>
                        <div class="avatar-sm rounded-circle bg-info align-self-center">
                            <span class="avatar-title rounded-circle bg-info">
                                <i class="fas fa-money-bill-wave font-size-24"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h4 class="mb-2">{{ $availableSpace }}</h4>
                            <p class="text-muted mb-0">Slot Tersedia</p>
                        </div>
                        <div class="avatar-sm rounded-circle bg-warning align-self-center">
                            <span class="avatar-title rounded-circle bg-warning">
                                <i class="fas fa-parking font-size-24"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts -->
    <div class="row">
        <div class="col-xl-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Statistik Parkir 7 Hari Terakhir</h4>
                    <canvas id="weeklyChart" height="300"></canvas>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Distribusi Kendaraan</h4>
                    <canvas id="vehicleTypeChart" height="300"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Weekly Statistics Chart
    new Chart(document.getElementById('weeklyChart'), {
        type: 'line',
        data: {
            labels: @json($weeklyStats->pluck('date')),
            datasets: [{
                label: 'Total Kendaraan',
                data: @json($weeklyStats->pluck('total')),
                borderColor: '#556ee6',
                tension: 0.1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });

    // Vehicle Type Distribution Chart
    new Chart(document.getElementById('vehicleTypeChart'), {
        type: 'doughnut',
        data: {
            labels: ['Motor', 'Mobil'],
            datasets: [{
                data: [@json($motorCount), @json($mobilCount)],
                backgroundColor: ['#34c38f', '#556ee6']
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });
});
</script>
@endpush
@endsection