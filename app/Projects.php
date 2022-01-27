<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    protected $fillable = [
        'projecttitle', 'startdate', 'enddate', 'teamleader', 'teammembers', 'description', 'totalweight', 'status', 'accomplishment', 'fullname', 'phonenumber', 'unit', 'subunit'
    ];
}
