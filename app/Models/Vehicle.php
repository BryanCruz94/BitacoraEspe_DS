<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicle extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable=[
        "description",
        "plate",
        "in_university",
        "img_url"
    ];
    function vehicle_log() {
        return $this->hasMany(VehicleLog::class);
    }
}
