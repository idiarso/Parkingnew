@extends('layouts.dashboard')
@section('title', 'Input Kendaraan')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Input Kendaraan Masuk</h4>
                    <form action="{{ route('parking.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Nomor Plat</label>
                                    <input type="text" class="form-control" name="nomor_plat" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Jenis Kendaraan</label>
                                    <select class="form-select" name="jenis_kendaraan" required>
                                        <option value="motor">Motor</option>
                                        <option value="mobil">Mobil</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection