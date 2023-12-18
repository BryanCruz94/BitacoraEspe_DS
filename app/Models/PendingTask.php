<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendingTask extends Model
{
    use HasFactory;

    protected $fillable=[
        "hour_create",
        "hour_done",
        "pending_task",
        "task_done",
        "userCreate_id",
        "userDone_id",
        "observations",

    ];
}
