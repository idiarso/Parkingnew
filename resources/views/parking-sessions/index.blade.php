@extends('layouts.app')

@section('title', 'Parking Sessions')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Active Parking Sessions</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Ticket #</th>
                                    <th>Plate Number</th>
                                    <th>Entry Gate</th>
                                    <th>Entry Time</th>
                                    <th>Duration</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($activeSessions as $session)
                                <tr>
                                    <td>{{ $session->ticket_number }}</td>
                                    <td>{{ $session->plate_number }}</td>
                                    <td>{{ $session->entryGate->gate_name }}</td>
                                    <td>{{ $session->entry_time->format('d M Y H:i:s') }}</td>
                                    <td>{{ $session->entry_time->diffForHumans(now(), true) }}</td>
                                    <td>
                                        <span class="badge bg-{{ $session->status === 'ACTIVE' ? 'success' : 'secondary' }}">
                                            {{ $session->status }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('parking.sessions.show', $session) }}" 
                                           class="btn btn-sm btn-info">
                                            <i class="fas fa-eye"></i> View
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center">No active parking sessions</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{ $activeSessions->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection