@extends('layouts.dashboard')
@section('title', 'Pengaturan Sistem')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Pengaturan Tarif Parkir</h4>
                    <form action="{{ route('settings.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Tarif Motor</h5>
                                <div class="mb-3">
                                    <label class="form-label">Tarif Awal</label>
                                    <input type="number" class="form-control" name="motor_initial_rate" 
                                           value="{{ $settings->motor_initial_rate ?? 2000 }}" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tarif per Jam Berikutnya</label>
                                    <input type="number" class="form-control" name="motor_hourly_rate" 
                                           value="{{ $settings->motor_hourly_rate ?? 1000 }}" required>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <h5>Tarif Mobil</h5>
                                <div class="mb-3">
                                    <label class="form-label">Tarif Awal</label>
                                    <input type="number" class="form-control" name="car_initial_rate" 
                                           value="{{ $settings->car_initial_rate ?? 5000 }}" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tarif per Jam Berikutnya</label>
                                    <input type="number" class="form-control" name="car_hourly_rate" 
                                           value="{{ $settings->car_hourly_rate ?? 2000 }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-12">
                                <h5>Pengaturan Umum</h5>
                                <div class="mb-3">
                                    <label class="form-label">Durasi Minimum (Jam)</label>
                                    <input type="number" class="form-control" name="minimum_duration" 
                                           value="{{ $settings->minimum_duration ?? 1 }}" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Batas Maksimum Kendaraan</label>
                                    <input type="number" class="form-control" name="max_vehicles" 
                                           value="{{ $settings->max_vehicles ?? 100 }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Simpan Pengaturan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection