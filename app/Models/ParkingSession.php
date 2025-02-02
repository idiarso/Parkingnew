<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ParkingSession extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'vehicle_id',
        'entry_gate_id',
        'exit_gate_id',
        'ticket_number',
        'plate_number',
        'vehicle_type',
        'entry_photo',
        'exit_photo',
        'entry_time',
        'exit_time',
        'parking_fee',
        'status',
        'notes'
    ];

    protected $casts = [
        'entry_time' => 'datetime',
        'exit_time' => 'datetime',
        'parking_fee' => 'decimal:2'
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function entryGate()
    {
        return $this->belongsTo(Gate::class, 'entry_gate_id');
    }

    public function exitGate()
    {
        return $this->belongsTo(Gate::class, 'exit_gate_id');
    }

    public function calculateParkingFee()
    {
        // Implementasi perhitungan biaya parkir
        // Akan ditambahkan nanti sesuai dengan aturan bisnis
    }
}