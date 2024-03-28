<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class adminDrivers extends Model
{
    use HasFactory;

    protected $fillable=[
        "identification_card",
        "names",
        "last_names",
        "phone",
        "blood_type",
        "rank_id",
        "img",
        "created_by",
        "updated_by",
        "deleted_by"
    ];
}
