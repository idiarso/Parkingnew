@extends('layouts.dashboard')
@section('title', 'Riwayat Parkir')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="card-title">Riwayat Parkir</h4>
                        <form class="d-flex gap-2">
                            <input type="date" class="form-control" name="start_date" value="{{ request('start_date') }}">
                            <input type="date" class="form-control" name="end_date" value="{{ request('end_date') }}">
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
                                    <th>Operator</th>
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
                                    <td>Rp {{ number_format($parking->biaya, 0, ',', '.') }}</td>
                                    <td>{{ $parking->user->name }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center">Tidak ada data</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $parkings->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection