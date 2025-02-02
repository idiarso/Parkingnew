@extends('layouts.dashboard')
@section('title', 'Daftar Kendaraan')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Daftar Kendaraan Parkir</h4>
                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap mb-0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nomor Plat</th>
                                    <th>Jenis</th>
                                    <th>Waktu Masuk</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($vehicles as $vehicle)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $vehicle->nomor_plat }}</td>
                                    <td>{{ $vehicle->jenis_kendaraan }}</td>
                                    <td>{{ $vehicle->waktu_masuk }}</td>
                                    <td>{{ $vehicle->status }}</td>
                                    <td>
                                        <a href="{{ route('parking.exit', $vehicle->id) }}" class="btn btn-primary btn-sm">Proses Keluar</a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">Tidak ada kendaraan parkir</td>
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