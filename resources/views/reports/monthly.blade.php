@extends('layouts.dashboard')
@section('title', 'Laporan Bulanan')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="card-title">Laporan Bulanan</h4>
                        <div class="d-flex gap-2">
                            <form class="d-flex gap-2">
                                <input type="month" class="form-control" name="month" 
                                       value="{{ request('month', date('Y-m')) }}">
                                <button type="submit" class="btn btn-primary">Filter</button>
                            </form>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                    Export
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('reports.monthly.export', ['type' => 'pdf'] + request()->all()) }}">
                                            <i class="fas fa-file-pdf me-2"></i> Export PDF
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('reports.monthly.export', ['type' => 'excel'] + request()->all()) }}">
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