<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'vehicle_id',
        'type',
        'date',
        'mileage',
        'garage',
        'extras',
        'notes',
        'next_service',
        'completed',
        'attachment',
    ];
    protected $casts = [
        'date' => 'datetime',
    ];
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
    
}
