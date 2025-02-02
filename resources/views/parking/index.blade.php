@extends('layouts.dashboard')
@section('title', 'Daftar Kendaraan')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="card-title">Daftar Kendaraan Parkir</h4>
                        <div class="search-box">
                            <form class="d-flex gap-2">
                                <input type="text" 
                                       class="form-control" 
                                       name="search" 
                                       placeholder="Cari nomor plat..."
                                       value="{{ request('search') }}"
                                       autocomplete="off">
                                <select class="form-select" name="jenis">
                                    <option value="">Semua Jenis</option>
                                    <option value="motor" {{ request('jenis') == 'motor' ? 'selected' : '' }}>Motor</option>
                                    <option value="mobil" {{ request('jenis') == 'mobil' ? 'selected' : '' }}>Mobil</option>
                                </select>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-search"></i> Cari
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap mb-0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nomor Plat</th>
                                    <th>Jenis</th>
                                    <th>Waktu Masuk</th>
                                    <th>Durasi</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($vehicles as $vehicle)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $vehicle->nomor_plat }}</td>
                                    <td>{{ ucfirst($vehicle->jenis_kendaraan) }}</td>
                                    <td>{{ $vehicle->waktu_masuk->format('d/m/Y H:i') }}</td>
                                    <td>{{ $vehicle->getDurationAttribute() }}</td>
                                    <td>
                                        <span class="badge bg-success">Aktif</span>
                                    </td>
                                    <td>
                                        <button type="button" 
                                                class="btn btn-primary btn-sm"
                                                onclick="processExit('{{ $vehicle->id }}', '{{ $vehicle->nomor_plat }}')">
                                            Proses Keluar
                                        </button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center">Tidak ada kendaraan parkir</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $vehicles->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi Keluar -->
<div class="modal fade" id="exitModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Keluar Parkir</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Anda akan memproses keluar kendaraan dengan plat nomor: <strong id="plateNumber"></strong></p>
                <form id="exitForm" action="" method="POST">
                    @csrf
                    @method('PUT')
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-success" onclick="printReceipt(currentVehicleId)">
                    <i class="fas fa-print"></i> Cetak Struk
                </button>
                <button type="button" class="btn btn-primary" onclick="document.getElementById('exitForm').submit()">
                    Proses Keluar
                </button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
let currentVehicleId = null;

function processExit(id, plate) {
    currentVehicleId = id;
    document.getElementById('plateNumber').textContent = plate;
    document.getElementById('exitForm').action = `/parking/${id}/exit`;
    new bootstrap.Modal(document.getElementById('exitModal')).show();
}

function printReceipt(id) {
    window.open(`/parking/${id}/receipt`, 'receipt', 'width=400,height=600');
}
</script>
@endpush