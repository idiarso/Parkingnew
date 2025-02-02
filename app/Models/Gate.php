<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gate extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'gate_name',
        'gate_type',
        'location',
        'status',
        'camera_ip'
    ];

    protected $casts = [
        'status' => 'string',
        'gate_type' => 'string'
    ];

    public function parkingSessions()
    {
        return $this->hasMany(ParkingSession::class);
    }
}