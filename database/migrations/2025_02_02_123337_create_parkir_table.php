<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parkir extends Model
{
    use HasFactory;

    protected $table = 'parkir';
    
    protected $fillable = [
        'nomor_kendaraan',
        'jenis_kendaraan',
        'waktu_masuk',
        'waktu_keluar',
        'biaya',
        'status',
        'created_by',
        'updated_by'
    ];

    protected $casts = [
        'waktu_masuk' => 'datetime',
        'waktu_keluar' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}