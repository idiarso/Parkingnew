<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicle extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'plate_number',
        'vehicle_type',
        'brand',
        'model',
        'color',
        'status',
        'notes'
    ];

    public function parkingSessions()
    {
        return $this->hasMany(ParkingSession::class);
    }

    public function getFormattedPlateNumberAttribute()
    {
        // Format plat nomor (misal: B 1234 ABC)
        return preg_replace('/([A-Z]{1,2})(\d{1,4})([A-Z]{1,3})/', '$1 $2 $3', $this->plate_number);
    }
}