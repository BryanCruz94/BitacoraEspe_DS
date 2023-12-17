<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminVehicles extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'plate',
        'in_university',
        'img_url'
    ];

    function vehicle_log() {
        return $this->hasMany(VehicleLog::class);
    }
}
