<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;


    protected $fillable=[
        "identification_card",
        "names",
        "last_names",
        "phone",
        "blood_type",
        "rank_id",
        "img"
    ];

    public function rank(){
        return $this->belongsTo(Rank::class);
    }
}


