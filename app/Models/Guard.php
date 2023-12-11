<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Guard extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable=[
        "identification_card",
        "names",
        "last_names",
        "phone",
        "blood_type",
        "password",
        "created_by",
        "updated_by",
        "deleted_by"
    ];
}
