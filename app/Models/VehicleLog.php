<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VehicleLog extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable=[
        "departure_time",
        "entry_time",
        "destination",
        "departure_km",
        "entry_km",
        "mission",
        "observation",
        "GuardsOut_id",
        "GuardsIn_id",
        "Vehicle_id",
        "Driver_id",
        "created_by",
        "updated_by",
        "deleted_by"
    ];
}
