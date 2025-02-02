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
                        <form class="d-flex gap-2">
                            <input type="date" class="form-control" name="date" value="{{ request('date', date('Y-m-d')) }}">
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-centered mb-0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nomor Plat</th>
                                    <th>Jenis</th>
                                    <th>Waktu Masuk</th>
                                    <th>Waktu Keluar</th>
                                    <th>Durasi</th>
                                    <th>Biaya</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($parkings as $parking)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $parking->nomor_plat }}</td>
                                    <td>{{ $parking->jenis_kendaraan }}</td>
                                    <td>{{ $parking->waktu_masuk }}</td>
                                    <td>{{ $parking->waktu_keluar }}</td>
                                    <td>{{ $parking->durasi }}</td>
                                    <td>{{ number_format($parking->biaya, 0, ',', '.') }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center">Tidak ada data</td>
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