<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    protected $fillable = [
        'projecttitle', 'taskname', 'startdate', 'enddate', 'personincharge', 'weight', 'description', 'accomplishedweight', 'status'
    ];
}
