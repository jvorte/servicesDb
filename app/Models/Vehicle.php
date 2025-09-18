<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Vehicle extends Model
{
    use HasFactory;

    use SoftDeletes;
    protected $fillable = ['brand', 'model','plate',  'type','engine', 'year'];

    public function services()
    {
        return $this->hasMany(Service::class)->withTrashed(); 
    }



}
