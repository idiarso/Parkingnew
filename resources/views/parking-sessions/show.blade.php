@extends('layouts.app')

@section('title', 'Parking Session Details')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        Parking Session Details - {{ $session->ticket_number }}
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Vehicle Information</h5>
                            <table class="table">
                                <tr>
                                    <th>Plate Number</th>
                                    <td>{{ $session->plate_number }}</td>
                                </tr>
                                <tr>
                                    <th>Vehicle Type</th>
                                    <td>{{ $session->vehicle_type }}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        <span class="badge bg-{{ $session->status === 'ACTIVE' ? 'success' : 'secondary' }}">
                                            {{ $session->status }}
                                        </span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h5>Session Information</h5>
                            <table class="table">
                                <tr>
                                    <th>Entry Gate</th>
                                    <td>{{ $session->entryGate->gate_name }}</td>
                                </tr>
                                <tr>
                                    <th>Entry Time</th>
                                    <td>{{ $session->entry_time->format('d M Y H:i:s') }}</td>
                                </tr>
                                @if($session->exit_time)
                                <tr>
                                    <th>Exit Gate</th>
                                    <td>{{ $session->exitGate->gate_name }}</td>
                                </tr>
                                <tr>
                                    <th>Exit Time</th>
                                    <td>{{ $session->exit_time->format('d M Y H:i:s') }}</td>
                                </tr>
                                <tr>
                                    <th>Duration</th>
                                    <td>{{ $session->entry_time->diffForHumans($session->exit_time, true) }}</td>
                                </tr>
                                <tr>
                                    <th>Parking Fee</th>
                                    <td>Rp {{ number_format($session->parking_fee, 0, ',', '.') }}</td>
                                </tr>
                                @endif
                            </table>
                        </div>
                    </div>
                    
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <h5>Entry Photo</h5>
                            @if($session->entry_photo)
                            <img src="{{ Storage::url($session->entry_photo) }}" 
                                 class="img-fluid" alt="Entry Photo">
                            @else
                            <p>No entry photo available</p>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <h5>Exit Photo</h5>
                            @if($session->exit_photo)
                            <img src="{{ Storage::url($session->exit_photo) }}" 
                                 class="img-fluid" alt="Exit Photo">
                            @else
                            <p>No exit photo available</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection