<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PendingTask extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable=[
        "hour_create",
        "hour_done",
        "pending_task",
        "task_done",
        "userCreate_id",
        "userDone_id",
        "observations",
        "created_by",
        "updated_by",
        "deleted_by"
    ];
}
