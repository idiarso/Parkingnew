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
                        <div class="d-flex gap-2">
                            <form class="d-flex gap-2">
                                <select class="form-select" name="year">
                                    @for($i = date('Y'); $i >= 2020; $i--)
                                        <option value="{{ $i }}" {{ request('year', date('Y')) == $i ? 'selected' : '' }}>
                                            {{ $i }}
                                        </option>
                                    @endfor
                                </select>
                                <button type="submit" class="btn btn-primary">Filter</button>
                            </form>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                    Export
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('reports.yearly.export', ['type' => 'pdf'] + request()->all()) }}">
                                            <i class="fas fa-file-pdf me-2"></i> Export PDF
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('reports.yearly.export', ['type' => 'excel'] + request()->all()) }}">
                                            <i class="fas fa-file-excel me-2"></i> Export Excel
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Table content here -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection