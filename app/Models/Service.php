<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Service extends Model
{

    use SoftDeletes;
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
