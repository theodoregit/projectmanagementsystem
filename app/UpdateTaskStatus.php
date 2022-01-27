<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UpdateTaskStatus extends Model
{
    protected $fillable = [
        'taskname', 'personincharge', 'accomplishment', 'challenge', 'accomplishedweight', 'is_last_update'
    ];
}
